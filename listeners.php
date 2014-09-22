<?php
Event::listen('Modules.Session.Events.*', 'Modules\Session\Listeners\SendResetCodeEmail');
Event::listen('Modules.Session.Events.*', 'Modules\Session\Listeners\SendRegistrationConfirmationEmail');