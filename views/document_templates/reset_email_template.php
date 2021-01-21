<body class='' style='background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
    <table border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;'>
      <tr>
        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;'>&nbsp;</td>
        <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;'>
          <div class='content' style='box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;'>

            <!-- START CENTERED WHITE CONTAINER -->
            <span class='preheader' style='color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;'>Solicitud de reestablecimiento para el correo: <b><?php echo $email ?></b></span>
            <table class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;'>

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;'>
                  <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;'>
                    <img src='<?php echo SITE_URL ?>/public/img/Logo.png' style="max-width:300px;margin-left:20%"></img>
                    <tr>
                      <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;'>
												Solicitaste recientemente reestablecer tu contraseña, para continua haz click en el siguiente botón:<br><br>
                        <table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;'>
                          <tbody>
                            <tr>
                              <td style='font-family: sans-serif; font-size: 14px; vertical-align: top; border-radius: 5px; text-align: center;'><a href='<?php echo SITE_URL ?>/reset/?code=<?php echo $code ?>' style='display: inline-block; color: #ffffff; background-color: #20BEC6; border: solid 1px #20BEC6; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #20BEC6;'> Reestablecer contraseña</a></td>
                            </tr>
                          </tbody>
                        </table>
                        <p>Si el botón no te redirige a la página de reestablecimiento, intenta con el siguiente <b><a href='<?php echo SITE_URL ?>/reset/?code=<?php echo $code ?>' style="color: #20BEC6;">link a la página de reestablecimiento</a></b></p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;'>&nbsp;</td>
      </tr>
  </table>
</body>