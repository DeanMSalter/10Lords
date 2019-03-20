<!--UP871672-->
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Account settings</title>
  </head>
  <body>
    <div id="content-complex-image">
        <div id="sidebar">
            <ul>
                <li><a href="/account/images">Your images</a></li>
                <li><a href="/account/settings">Account settings</a></li>
            </ul>
        </div>
        <div id="content-inner">
            <p>Modify your account settings</p>
            <?php echo $this->Session->flash(); ?>
            <?php
                echo $this->Form->create('User');
                echo $this->Form->input('currentPassword', array('type' => 'password'));
                echo $this->Form->input('username', array('disabled' => 'disabled', 'value' => $username));
                echo $this->Form->input('email');
                echo $this->Form->input('password', array('type' => 'password'));
                echo $this->Form->end('Update');
            ?>
        </div>
        <div class="clear"></div>
    </div>

and this is my controller action:

public function settings() {
    $this->set('title_for_layout', 'Account Settings');

    $this->User->id = $this->Auth->user('id');
    if ($this->request->is('post')) {
        if($this->Auth->user('password') == $this->request->data['User']['currentPassword']) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Your details have been saved');
                $this->redirect(array('action' => 'settings'));
            } else {
                $this->Session->setFlash('Your details could not be updated. Try again.');
            }
        } else {
             $this->Session->setFlash('Invalid password. Try again.');
        }            
    }
}

  </body>
  </html>