<?php


require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){

	Redirect::to('index.php');
}

if (Input::exists()) {
	if (Token::check(Input::get('token'))) {
		
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'name' => array(
				'required' => true,
				'min' => 2,
				'max' => 50
				)
			));

		if($validation->passed()){

			try{

				$user->update(array(
					'name' => Input::get('name')
 					));

				Session::flash('home', 'Details updated');
				Redirect::to('index.php');


			}catch(Exception $e){

				die($e->getMessage());
			}

		}else{

			foreach ($validation->errors() as $error) {

				echo $error, '<br>';
			}
		}
	}
}



?>


<form action="update.php" method="POST">
	
	<div class="field">
		<label for="name">Name</label>
		<input id="name" type="text" name="name" value="<?php echo escape($user->data()->name); ?>">

		<input type="submit" name="Update" value="Update">
		<input name="token" id="token" type="hidden" value="<?php echo Token::generate();?>">
	</div>
</form>