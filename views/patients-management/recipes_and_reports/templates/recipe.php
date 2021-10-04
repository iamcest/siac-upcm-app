
<STYLE TYPE="text/css">
<!--
  @page { size: 8.5in 11in; margin-right: 1.12in; margin-top: 0.25in; margin-bottom: 0.16in }
  P { margin-bottom: 0.08in; direction: ltr; color: #000000; widows: 2; orphans: 2 }
  P.western { font-family: "Times New Roman", serif; font-size: 12pt; so-language: es-ES }
  P.cjk { font-family: "Times New Roman", serif; font-size: 12pt }
  P.ctl { font-family: "Times New Roman", serif; font-size: 12pt; so-language: ar-SA }
  H2 { margin-left: -0.5in; text-indent: 0.5in; margin-top: 0in; margin-bottom: 0in; direction: ltr; color: #000000; text-align: center; widows: 2; orphans: 2 }
  H2.western { font-family: "Americana", "Cambria", serif; font-size: 14pt; so-language: es-VE }
  H2.cjk { font-family: "Times New Roman", serif; font-size: 14pt }
  H2.ctl { font-family: "Americana", "Cambria", serif; font-size: 12pt; so-language: ar-SA }
  H3 { margin-top: 0in; margin-bottom: 0in; direction: ltr; color: #000000; text-align: center; widows: 2; orphans: 2 }
  H3.western { font-family: "Americana", "Cambria", serif; so-language: es-VE }
  H3.cjk { font-family: "Times New Roman", serif }
  H3.ctl { font-family: "Americana", "Cambria", serif; font-size: 12pt; so-language: ar-SA }
-->
</STYLE>
<BODY LANG="en-US" TEXT="#000000" DIR="LTR">
<DIV TYPE=HEADER>
  <TABLE WIDTH=500 CELLPADDING=7 CELLSPACING=0>
    <COL WIDTH=525>
    <TR>
      <TD WIDTH=240 VALIGN=TOP STYLE="padding: 0in 0.08in">
        <IMG src="<?php echo SITE_URL ?>/public/img/upcms-logo/<?php echo $_SESSION['upcm_logo'] ?>" style="max-width:120px"></IMG>
        <IMG src="<?php echo SITE_URL ?>/public/img/Logo.png" style="max-width:140px"></IMG>
      </TD>
      <TD WIDTH=295 VALIGN=TOP>
        <P LANG="es-ES" CLASS="western" STYLE="text-align: right"><STRONG><FONT COLOR="#222222"><FONT FACE="Arial, sans-serif"><SPAN STYLE="background: #fafafa"></SPAN></FONT></FONT></STRONG><STRONG><FONT COLOR="#222222"><FONT FACE="Arial, sans-serif"><FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN STYLE="background: #fafafa"><?php echo strtoupper($_SESSION['upcm_name']) ?></SPAN></SPAN></FONT></FONT></FONT></STRONG>
        </P>
        <P LANG="es-ES" CLASS="western" STYLE="text-align: right"><STRONG><FONT COLOR="#222222"><FONT FACE="Arial, sans-serif"><SPAN STYLE="background: #fafafa"></SPAN></FONT></FONT></STRONG><STRONG><FONT COLOR="#222222"><FONT FACE="Arial, sans-serif"><FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN STYLE="background: #fafafa"><?php echo $_SESSION['gender'] == 'M' ? 'Dr.' : 'Dra.' ?> <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?> </SPAN></SPAN></FONT></FONT></FONT></STRONG>
        </P>
      </TD>
    </TR>
  </TABLE>
</DIV>
<TABLE WIDTH=500 CELLPADDING=7 CELLSPACING=0>
  <COL WIDTH=525>
  <TR>
    <TD WIDTH=262 VALIGN=TOP STYLE="border: 1px solid #000000; padding: 0in 0.08in">
      <P LANG="es-ES" CLASS="western" ALIGN=JUSTIFY><STRONG><FONT COLOR="#222222"><FONT FACE="Arial, sans-serif"><FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN STYLE="background: #fafafa">Nombre: <?php echo empty($patient['full_name']) ? $patient['first_name'] : $patient['full_name'] ?> </SPAN></SPAN></FONT></FONT></FONT></STRONG><STRONG><FONT COLOR="#222222"><FONT FACE="Arial, sans-serif"><SPAN STYLE="background: #fafafa">
        </SPAN></FONT></FONT></STRONG>
      </P>
    </TD>
    <TD WIDTH=262 VALIGN=TOP STYLE="border: 1px solid #000000; padding: 0in 0.08in">
      <P LANG="es-ES" CLASS="western" ALIGN=JUSTIFY><STRONG><FONT COLOR="#222222"><FONT FACE="Arial, sans-serif"><SPAN STYLE="background: #fafafa"></SPAN></FONT></FONT></STRONG><STRONG><FONT COLOR="#222222"><FONT FACE="Arial, sans-serif"><FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN STYLE="background: #fafafa">
       Identificación: <?php echo $patient['document_id'] ?>  </SPAN></SPAN></FONT></FONT></FONT></STRONG>
      </P>
    </TD>
  </TR>
  <TR>
    <TD WIDTH=262 VALIGN=TOP STYLE="border: 1px solid #000000; padding: 0in 0.08in">
      <P LANG="es-ES" CLASS="western" ALIGN=JUSTIFY><STRONG><FONT COLOR="#222222"><FONT FACE="Arial, sans-serif"><SPAN STYLE="background: #fafafa"></SPAN></FONT></FONT></STRONG><STRONG><FONT COLOR="#222222"><FONT FACE="Arial, sans-serif"><FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN STYLE="background: #fafafa">
       Edad: <?php echo $patient['age'] ?> años  </SPAN></SPAN></FONT></FONT></FONT></STRONG>
      </P>
    </TD>
    <TD WIDTH=262 VALIGN=TOP STYLE="border: 1px solid #000000; padding: 0in 0.08in">
      <P LANG="es-ES" CLASS="western" ALIGN=JUSTIFY><STRONG><FONT COLOR="#222222"><FONT FACE="Arial, sans-serif"><SPAN STYLE="background: #fafafa"></SPAN></FONT></FONT></STRONG><STRONG><FONT COLOR="#222222"><FONT FACE="Arial, sans-serif"><FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN STYLE="background: #fafafa">
       Fecha de la consulta: <?php echo $appointment_date ?>  </SPAN></SPAN></FONT></FONT></FONT></STRONG>
      </P>
    </TD>
  </TR>
</TABLE>
<P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in"><BR>
</P>
<?php if (!empty($diagnostics)): ?>
<TABLE WIDTH=550 CELLPADDING=5 CELLSPACING=0>
  <TR>
    <TD WIDTH=262 HEIGHT=10 STYLE="padding-top: 0in; padding-bottom: 0in; padding-left: 0.05in; padding-right: 0in">
      <P LANG="es-VE" CLASS="western" ALIGN=CENTER><FONT COLOR="#000000"><FONT FACE="Calibri, sans-serif">Diagnósticos</FONT></FONT></P>
    </TD>
    <TD WIDTH=262 STYLE="padding: 0in 0.05in">
      <P LANG="es-ES" CLASS="western" ALIGN=CENTER><FONT COLOR="#000000"><FONT FACE="Calibri, sans-serif"><SPAN LANG="es-VE"> Metas de Tratamiento </SPAN></FONT></FONT>
      </P>
    </TD>
  </TR>
  <?php foreach ($diagnostics as $item): ?>
    <TR>
      <TD WIDTH=262 HEIGHT=10 STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.05in; padding-right: 0in">
        <P LANG="es-ES" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in">
        <FONT COLOR="#000080"><FONT FACE="Calibri, sans-serif"><SPAN LANG="es-VE"><?php echo $item['diagnostic'] ?></SPAN></FONT></FONT></P>
      </TD>
      <TD WIDTH=262 STYLE="border: 1px solid #000000; padding: 0in 0.05in">
        <P LANG="es-ES" CLASS="western" ALIGN=CENTER><FONT COLOR="#000080"><FONT FACE="Calibri, sans-serif"><SPAN LANG="es-VE"><?php echo $item['treatment_goal'] ?></SPAN></FONT></FONT>
        </P>
      </TD>
    </TR>
  <?php endforeach ?>
</TABLE>
<?php endif ?>
<?php if (!empty($instructions)): ?>
<P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in"><FONT FACE="Calibri, sans-serif"><FONT SIZE=4>Indicaciones
</FONT></FONT>
</P>
<P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in"><BR>
</P>
<TABLE WIDTH=550 CELLPADDING=5 CELLSPACING=0>
  <COL WIDTH=125>
  <COL WIDTH=125>
  <COL WIDTH=125>
  <COL WIDTH=125>
  <TR VALIGN=TOP>
    <TD WIDTH=125 HEIGHT=11 STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.05in; padding-right: 0in">
      <H2 LANG="es-VE" CLASS="western" STYLE="font-weight: normal"><FONT FACE="Calibri, sans-serif">Medicamento</FONT></H2>
    </TD>
    <TD WIDTH=125 STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.05in; padding-right: 0in">
      <H3 LANG="es-VE" CLASS="western" STYLE="font-weight: normal"><FONT FACE="Calibri, sans-serif">Dosis</FONT></H3>
    </TD>
    <TD WIDTH=125 STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.05in; padding-right: 0in">
      <H3 LANG="es-VE" CLASS="western" STYLE="font-weight: normal"><FONT FACE="Calibri, sans-serif">Horario</FONT></H3>
    </TD>
    <TD WIDTH=125 STYLE="border: 1px solid #000000; padding: 0in 0.05in">
      <H3 LANG="es-VE" CLASS="western" STYLE="font-weight: normal"><FONT FACE="Calibri, sans-serif">Observaciones</FONT></H3>
    </TD>
  </TR>
  <?php foreach ($instructions as $item): ?>
  <TR>
    <TD WIDTH=125 HEIGHT=34 STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding: 0in 0.05in;">
      <P LANG="es-VE" CLASS="western" ALIGN=CENTER>
        <?php echo $item['treatment'] ?>
      </P>
    </TD>
    <TD WIDTH=125 STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding: 0in 0.05in;">
      <P LANG="es-VE" CLASS="western" ALIGN=CENTER>
        <?php echo $item['dosis'] ?>
      </P>
    </TD>
    <TD WIDTH=125 STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding: 0in 0.05in; padding-right: 0in">
      <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
        <?php echo $item['schedule'] ?>
      </P>
    </TD>
    <TD WIDTH=125 STYLE="border: 1px solid #000000; padding: 0in 0.05in">
      <P LANG="es-VE" CLASS="western" ALIGN=CENTER>
        <?php echo $item['observations'] ?>
      </P>
    </TD>
  </TR>
  <?php endforeach ?>
</TABLE>
  
<?php endif ?>
<?php if (!empty($comments)): ?>
<P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in"> <FONT FACE="Calibri, sans-serif"><FONT SIZE=4>Comentarios: </FONT></FONT>
</P>
<P LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in; line-height: 115%">
  <FONT COLOR="#000080"><FONT FACE="Calibri, sans-serif"><FONT SIZE=2 STYLE="font-size: 11pt"><SPAN LANG="es-VE"><?php echo $comments ?>
</SPAN></FONT></FONT></FONT></P>
<?php endif ?>

<P LANG="es-ES" CLASS="western" STYLE="margin-left: 0.03in; margin-bottom: 0in">
<FONT COLOR="#000080"> </FONT><FONT COLOR="#000080"><FONT FACE="Calibri, sans-serif"><FONT SIZE=2><SPAN LANG="es-VE">Próxima
cita: <?php echo empty($next_appointment) ? '' : $next_appointment; ?> </SPAN></FONT></FONT></FONT>
</P>

<P LANG="es-ES" CLASS="western" STYLE="text-align: right;">
<FONT FACE="Calibri, sans-serif"><FONT SIZE=4><SPAN LANG="pt-BR"> <?php echo $_SESSION['gender'] == 'M' ? 'Dr.' : 'Dra.' ?>
</SPAN></FONT></FONT><FONT FACE="Americana, Cambria, serif"><FONT SIZE=4><SPAN LANG="pt-BR"><B> <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></B></SPAN></FONT></FONT></P>
<DIV TYPE=FOOTER>
  <P LANG="es-VE" ALIGN=CENTER STYLE="margin-bottom: 0in"> 
  </P>
  <P LANG="es-VE" ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
  </P>
</DIV>
</BODY>