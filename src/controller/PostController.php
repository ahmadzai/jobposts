<?php
/**
 * Created by PhpStorm.
 * User: Awesome
 * Date: 2/19/2019
 * Time: 12:09 PM
 */

namespace JobPosts\Controller;

use JobPosts\bin\Controller;
use JobPosts\bin\Database;
use JobPosts\service\EmailService;
use Rakit\Validation\Validator;
use JobPosts\model\JobPost;

class PostController extends Controller
{
    public function index() {

        $errors = null;
        $info = null;

        if(isset($_POST['addjob'])) {
            $validator = new Validator();

            $validation = $validator->validate($_POST,
                [
                    'title' => 'required|min:10',
                    'description' => 'required|min:20',
                    'email'=>'required|email'
                ]);
            if($validation->fails()) {
                $errors = $validation->errors();
                $errors = $errors->all('<li>:message</li>');
            } else {

                $em = Database::getEntityManager();
                $user = $em->getRepository("JobPosts\model\JobPost")->
                    findOneBy(['email'=>$_POST['email']]);

                $post = new JobPost();
                $post->setTitle($_POST['title']);
                $post->setDescription($_POST['description']);
                $post->setEmail($_POST['email']);
                $post->setIsSpam(false);

                $isPublic = false;
                if($user) {

                    if($user->isPublic())
                        $isPublic = true;
                }

                $post->setIsPublic($isPublic);

                $em = Database::getEntityManager();

                $em->persist($post);

                $em->flush();

                $info = "Your job post has been successfully published";

                $job_id = $post->getId();

                // send email to writer and moderator
                if(!$isPublic) {
                    // send it first to moderator
                    // Moderator Email, can be picked from User Management Part of the Application
                    // Or from the Settings file, but for this example I would just store it in the
                    // Below variable.
                    // For better arrangement, this could be wrapped in a function.
                    $moderatorEmail = "some.email@somedomain.com";
                    $mailer = new EmailService('gmail');
                    $emailSent = $mailer->send($moderatorEmail,
                        $_POST['title'],
                        $_POST['description'],
                        $job_id
                        );
                    if($emailSent) {
                        $mailer->send($_POST['email'],
                            $_POST['title'],
                            $_POST['description'],
                            $job_id
                        );
                    }

                    $info = "Your job post has been saved, it will be reviewed/confirmed by a moderator";

                }

            }

        }

        return $this->render("pages/post",[
            'title' => 'Post new job',
            'errors' => $errors,
            'info' => $info
        ]);

        //echo $response;
    }


    public function confirmJobPost($job_id) {
        $job_id = base64_decode($job_id);

        $conn = Database::getEntityManager();
        $queryBuilder = $conn->createQueryBuilder();
        $queryBuilder->update('jobpost', 'post')
            ->set('post.is_public', true)
            ->where('post.id=?')
            ->setParameter(0, $job_id);
        header('location: action?type='.base64_encode('published'));
    }

    public function rejectJobPost($job_id) {
        $job_id = base64_decode($job_id);
        $conn = Database::getEntityManager();
        $queryBuilder = $conn->createQueryBuilder();
        $queryBuilder->update('jobpost', 'post')
            ->set('post.is_spam', true)
            ->where('post.id=?')
            ->setParameter(0, $job_id);
        header('location: action?type='.base64_encode('spammed'));
    }

    /**
     * /TODO: this function could be implemented to list the jobs, with pagination
     */
    public function listJobPosts() {

    }


    public function actionCompleted($actionType) {

        $actionType = base64_decode($actionType);
        $type = 'success';
        $message = 'The job post has been successfully ';
        if($actionType == "posted")
            $type = "secondary";
        if($actionType == "spammed")
            $type = "warning";

        return $this->render("pages/action",[
            'type'=>$type,
            'message'=>$message.$actionType
        ]);

    }

}