<?php

class Register extends Routes
{

    public function initView()
    {
        $this->is_logged ? header("Location: " . $_SESSION['redirect_url']) : '';

        $this->header = false;
        $this->styles = [['name' => 'login']];
        $this->scripts = [
            ['name' => 'roles/data.min'],
            ['name' => 'vue-components/vue-tel-input-vuetify.min'],
            ['name' => 'register', 'version' => '1.0.0'],
        ];
        $this->footer = false;
        $this->content = new Template("register");
        $this->title = 'Registrarse';

        $this->render();
    }
}
