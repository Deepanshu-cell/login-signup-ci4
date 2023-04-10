<?php 

    namespace App\Controllers;

    use CodeIgniter\Exceptions\PageNotFoundException; // Add this line

    use App\Models\userModel;


    class Pages extends BaseController{


        // when the user is not logged in 
        public function index($page = 'signup'){

            if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
                // Whoops, we don't have a page for that!
                throw new PageNotFoundException($page);
            }
            
            $this->session->set('loggedIn',false);
            $data['error'] = '';
            return view('templates/navbar')
                . view('pages/'.$page,$data);
        }   

        public function signup(){
            helper('form');

            // Checks whether the form is submitted.
            if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.

            $this->session->set('loggedIn',false);
            $data['error'] = '';

            return view('templates/navbar')
                . view('pages/Signup',$data);
            }

            $post = $this->request->getPost(['username','email','password','confirm_password']);
            $email = $post['email'];
            $password = $post['password'];
            $confirm_password = $post['confirm_password'];
            $error="";

            if (! $this->validateData($post, [
                'username' => 'required|max_length[255]|min_length[3]|is_unique[login-signup.username]',
                'email'  => 'required|max_length[5000]|min_length[10]|is_unique[login-signup.email]|valid_email',
                'password'  => 'required|max_length[5000]|min_length[10]',
                'confirm_password'  => 'required|max_length[5000]|min_length[10]|matches[password]',
            ])) {

                $this->session->set('loggedIn',false);

                $validation = \Config\Services::validation();
                $data['error'] = $validation->listErrors();


                // The validation fails, so returns the form.
                return view('templates/navbar')
                    . view('pages/signup',$data);
            }

            else{

                // Use password_hash() function to
                // create a password hash
                $hash_password_salt = password_hash($post['password'],PASSWORD_DEFAULT);
                $password = $hash_password_salt;

                $model = new userModel();

                $returnVal = $model->save([
                    'username'  =>$post['username'],
                    'email' => $post['email'],
                    'password'  =>$password,
                ]);


                // $data['username'] = $post['username'];
                // $data['loggedIn'] = true;

                if($returnVal){
                    $this->session->set('username',$post['username']);
                    $this->session->set('loggedIn',true);
                }else{

                    $data['error'] = 'Problem in saving your data to the database';
                    return view('templates/navbar')
                    .view('pages/signup',$data);
                }

                return view('templates/navbar')
                    .view('pages/home');

            }


                
        }

        public function login(){
            helper('form');

            // Checks whether the form is submitted.
            if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.

            $this->session->set('loggedIn',false);


            return view('templates/navbar')
                . view('pages/Login');
            }

            $post = $this->request->getPost(['email','password']);
            $email = $post['email'];
            $password = $post['password'];
            $error="";

            if (! $this->validateData($post, [
                'email'  => 'required|valid_email',
                'password'  => 'required',
            ])) {

                $this->session->set('loggedIn',false);

                // The validation fails, so returns the form.
                return view('templates/navbar')
                    . view('pages/login');
            }

            // Getting user details and checking whether it exists in backend or not
            $model = new userModel();
            $user = $model->getUser($email);

            // checking if user exists
            if($user){

                $backendPassword = $user['password'];

                // if password is incorrect
                if(! password_verify(trim($password),trim($backendPassword))){

                    $this->session->set('loggedIn',false);
                    $this->session->setFlashdata('error', 'Password Incorrect');

                    return view('templates/navbar')
                    .view('pages/login');
                }

                // finally if user passes all the verification then he will redirected to home

                $this->session->set('username',$user['username']);
                $this->session->set('loggedIn',true);
    
                return view('templates/navbar')
                    .view('pages/home');
            }else{

                $this->session->set('loggedIn',false);
                $this->session->setFlashdata('error', 'Account does not exist');

                return view('templates/navbar')
                    .view('pages/login');
            }
        }

        public function logout(){
            $this->session->destroy();
            return redirect()->to('/login');
        }

    }
?>