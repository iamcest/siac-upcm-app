<STYLE TYPE="text/css">
<!--
@page {
    size: 8.5in 11in;
    margin-right: 0.8in;
    margin-top: 0.25in;
    margin-bottom: 0.16in
}

P {
    margin-bottom: 0.08in;
    direction: ltr;
    color: #000000;
    widows: 2;
    orphans: 2
}

P.western {
    font-family: "Times New Roman", serif;
    font-size: 12pt;
    so-language: es-ES
}

P.cjk {
    font-family: "Times New Roman", serif;
    font-size: 12pt
}

P.ctl {
    font-family: "Times New Roman", serif;
    font-size: 12pt;
    so-language: ar-SA
}
-->
</STYLE>

<BODY LANG="en-US" TEXT="#000000" DIR="LTR">
    <DIV TYPE=HEADER>
        <TABLE WIDTH=500 CELLPADDING=7 CELLSPACING=0>
            <COL WIDTH=525>
            <TR>
                <TD WIDTH=240 VALIGN=TOP STYLE="padding: 0in 0.08in">
                    <IMG src="<?php echo SITE_URL ?>/public/img/upcms-logo/<?php echo $_SESSION['upcm_logo'] ?>"
                        style="max-width:120px"></IMG>
                    <IMG src="<?php echo SITE_URL ?>/public/img/Logo.png" style="max-width:140px"></IMG>
                </TD>
                <TD WIDTH=295 VALIGN=TOP>
                    <P LANG="es-ES" CLASS="western" STYLE="text-align: right"><STRONG>
                            <FONT COLOR="#222222">
                                <FONT FACE="Arial, sans-serif"><SPAN STYLE=""></SPAN></FONT>
                            </FONT>
                        </STRONG><STRONG>
                            <FONT COLOR="#222222">
                                <FONT FACE="Arial, sans-serif">
                                    <FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN
                                                STYLE=""><?php echo strtoupper($_SESSION['upcm_name']) ?></SPAN></SPAN>
                                    </FONT>
                                </FONT>
                            </FONT>
                        </STRONG>
                    </P>
                    <P LANG="es-ES" CLASS="western" STYLE="text-align: right"><STRONG>
                            <FONT COLOR="#222222">
                                <FONT FACE="Arial, sans-serif"><SPAN STYLE=""></SPAN></FONT>
                            </FONT>
                        </STRONG><STRONG>
                            <FONT COLOR="#222222">
                                <FONT FACE="Arial, sans-serif">
                                    <FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN
                                                STYLE=""><?php echo $_SESSION['gender'] == 'M' ? 'Dr.' : 'Dra.' ?>
                                                <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?>
                                            </SPAN></SPAN></FONT>
                                </FONT>
                            </FONT>
                        </STRONG>
                    </P>
                </TD>
            </TR>
        </TABLE>
    </DIV>
    <TABLE WIDTH=500 CELLPADDING=7 CELLSPACING=0>
        <COL WIDTH=525>
        <TR>
            <TD WIDTH=262 VALIGN=TOP STYLE="border: 1px solid #000000; padding: 0in 0.08in">
                <P LANG="es-ES" CLASS="western" ALIGN=JUSTIFY><STRONG>
                        <FONT COLOR="#222222">
                            <FONT FACE="Arial, sans-serif">
                                <FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN STYLE="">Nombre:
                                            <?php echo empty($patient['full_name']) ? $patient['first_name'] : $patient['full_name'] ?>
                                        </SPAN></SPAN></FONT>
                            </FONT>
                        </FONT>
                    </STRONG><STRONG>
                        <FONT COLOR="#222222">
                            <FONT FACE="Arial, sans-serif"><SPAN STYLE="">
                                </SPAN></FONT>
                        </FONT>
                    </STRONG>
                </P>
            </TD>
            <TD WIDTH=262 VALIGN=TOP STYLE="border: 1px solid #000000; padding: 0in 0.08in">
                <P LANG="es-ES" CLASS="western" ALIGN=JUSTIFY><STRONG>
                        <FONT COLOR="#222222">
                            <FONT FACE="Arial, sans-serif"><SPAN STYLE=""></SPAN></FONT>
                        </FONT>
                    </STRONG><STRONG>
                        <FONT COLOR="#222222">
                            <FONT FACE="Arial, sans-serif">
                                <FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN STYLE="">
                                            Identificación: <?php echo $patient['document_id'] ?> </SPAN></SPAN></FONT>
                            </FONT>
                        </FONT>
                    </STRONG>
                </P>
            </TD>
        </TR>
        <TR>
            <TD WIDTH=262 VALIGN=TOP STYLE="border: 1px solid #000000; padding: 0in 0.08in">
                <P LANG="es-ES" CLASS="western" ALIGN=JUSTIFY><STRONG>
                        <FONT COLOR="#222222">
                            <FONT FACE="Arial, sans-serif"><SPAN STYLE=""></SPAN></FONT>
                        </FONT>
                    </STRONG><STRONG>
                        <FONT COLOR="#222222">
                            <FONT FACE="Arial, sans-serif">
                                <FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN STYLE="">
                                            Edad: <?php echo $patient['age'] ?> años </SPAN></SPAN></FONT>
                            </FONT>
                        </FONT>
                    </STRONG>
                </P>
            </TD>
            <TD WIDTH=262 VALIGN=TOP STYLE="border: 1px solid #000000; padding: 0in 0.08in">
                <P LANG="es-ES" CLASS="western" ALIGN=JUSTIFY><STRONG>
                        <FONT COLOR="#222222">
                            <FONT FACE="Arial, sans-serif"><SPAN STYLE=""></SPAN></FONT>
                        </FONT>
                    </STRONG><STRONG>
                        <FONT COLOR="#222222">
                            <FONT FACE="Arial, sans-serif">
                                <FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN STYLE="">
                                            Fecha de la consulta: <?php echo $appointment_date ?> </SPAN></SPAN></FONT>
                            </FONT>
                        </FONT>
                    </STRONG>
                </P>
            </TD>
        </TR>
    </TABLE>
    <P LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in"><STRONG>
            <FONT COLOR="#222222">
                <FONT FACE="Arial, sans-serif">
                    <FONT SIZE=2><SPAN STYLE="font-weight: normal"><SPAN STYLE="">Diagnósticos:
                            </SPAN></SPAN></FONT>
                </FONT>
            </FONT>
        </STRONG>
    </P>
        <?php for ($i=0; $i < count($meta['diagnostics']); $i++): ?>
    <P LANG="es-ES" CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=2><?php echo $i + 1 . ". {$meta['diagnostics'][$i]}" ?></FONT>
        </FONT>
    </P>
    <?php endfor ?>
    <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in"><BR>
    </P>
    <P LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=2><SPAN LANG="es-VE">Se
                    trata de paciente <?php echo $patient['gender'] == 'M' ? 'masculino' : 'femenino' ?>
                    <?php echo $patient['age'] ?> años, quien es paciente de esta unidad
                    desde : </SPAN></FONT>
        </FONT>
        <FONT COLOR="#ff0000"><?php echo $patient['entry_date'] ?></FONT>
        </FONT>
    </P>
    <P LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=2><SPAN LANG="es-VE">Está
                    recibiendo tratamiento médico y acude a controles regulares por
                    la(s) patología (a) arriba mencionada(s)</SPAN></FONT>
        </FONT>
    </P>
    <P LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in"><BR>
    </P>
    <P LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=2>Examen
                físico de ingreso: </FONT>
        </FONT>
    </P>
    <TABLE WIDTH=550 CELLPADDING=7 CELLSPACING=1>
        <COL WIDTH=125>
        <COL WIDTH=125>
        <COL WIDTH=125>
        <COL WIDTH=125>
        <TR>
            <TD WIDTH=125
                STYLE="border-top: 0.5px solid #000000; border-bottom: 1px solid #000000; border-left: 0.5px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                <P LANG="es-ES" CLASS="western"><SPAN STYLE="font-variant: small-caps">
                        <FONT FACE="Arial, sans-serif">
                            <FONT SIZE=2><SPAN LANG="es-VE">Talla:
                                    <?php echo "{$meta['anthropometry']['item']['height']} {$meta['anthropometry']['item']['height_suffix']}" ?></SPAN>
                            </FONT>
                        </FONT>
                    </SPAN>
                </P>
            </TD>
            <TD WIDTH=125
                STYLE="border-top: 0.5px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                <P LANG="es-ES" CLASS="western"><SPAN STYLE="font-variant: small-caps">
                        <FONT FACE="Arial, sans-serif">
                            <FONT SIZE=2><SPAN LANG="es-VE">Peso:
                                    <?php echo "{$meta['anthropometry']['item']['weight']} {$meta['anthropometry']['item']['weight_suffix']}" ?>
                                </SPAN></FONT>
                        </FONT>
                    </SPAN>
                </P>
            </TD>
            <TD WIDTH=125
                STYLE="border-top: 0.5px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                <P LANG="es-ES" CLASS="western">
                    <SPAN STYLE="font-variant: small-caps">
                        <FONT FACE="Arial, sans-serif">
                            <FONT SIZE=2>
                                <SPAN LANG="es-VE">IMC:
                                    <?php echo $meta['anthropometry']['item']['bmi'] ?>kg/m<sup>2</sup>
                                </SPAN>
                            </FONT>
                        </FONT>
                    </SPAN>
                </P>
            </TD>
            <TD WIDTH=125
                STYLE="border-top: 0.5px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 0.5px solid #000000; padding: 0in 0.08in">
                <P LANG="es-ES" CLASS="western"><SPAN STYLE="font-variant: small-caps">
                        <FONT FACE="Arial, sans-serif">
                            <FONT SIZE=2>
                                <SPAN LANG="es-VE">ASC:
                                    <?php echo $meta['anthropometry']['item']['cs'] ?>m<sup>2</sup>
                                </SPAN>
                            </FONT>
                        </FONT>
                    </SPAN></P>
            </TD>
        </TR>
        <TR>
            <TD WIDTH=125
                STYLE="border-top: .5px solid #000000; border-bottom: 0.5px solid #000000; border-left: 0.5px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                <P LANG="es-ES" CLASS="western"><SPAN STYLE="font-variant: small-caps">
                        <FONT FACE="Arial, sans-serif">
                            <FONT SIZE=2><SPAN LANG="es-VE">TA: <?php echo $meta['vital_signs']['ta_average'] ?> mmHg</SPAN></FONT>
                        </FONT>
                    </SPAN>
                </P>
            </TD>
            <TD WIDTH=125
                STYLE="border-top: .5px solid #000000; border-bottom: 0.5px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                <P LANG="es-ES" CLASS="western"><SPAN STYLE="font-variant: small-caps">
                        <FONT FACE="Arial, sans-serif">
                            <FONT SIZE=2><SPAN LANG="en-US">Fr
                                    C <?php echo $meta['vital_signs']['frc'] ?> lat x min</SPAN></FONT>
                        </FONT>
                    </SPAN>
                </P>
            </TD>
            <TD WIDTH=125
                STYLE="border-top: .5px solid #000000; border-bottom: 0.5px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                <P LANG="es-ES" CLASS="western"><SPAN STYLE="font-variant: small-caps">
                        <FONT FACE="Arial, sans-serif">
                            <FONT SIZE=2><SPAN LANG="en-US">Fr
                                    Resp: <?php echo $meta['vital_signs']['breathing_rate'] ?> xmin</SPAN></FONT>
                        </FONT>
                    </SPAN>
                </P>
            </TD>
            <TD WIDTH=125
                STYLE="border-top: .5px solid #000000; border-bottom: 0.5px solid #000000; border-left: 1px solid #000000; border-right: 0.5px solid #000000; padding: 0in 0.08in">
                <P LANG="es-ES" CLASS="western">
                    <SPAN STYLE="font-variant: small-caps">
                        <FONT FACE="Arial, sans-serif">
                            <FONT SIZE=2>
                                <SPAN LANG="en-US">sat: 
                                    O<sup>2</sup> <?php echo $meta['vital_signs']['sat'] ?> %
                                </SPAN>
                            </FONT>
                        </FONT>
                    </SPAN>
                </P>
            </TD>
        </TR>
    </TABLE>
    <P ALIGN=JUSTIFY
        STYLE="margin-left: 0.25in; text-indent: -0.25in; margin-bottom: 0in; line-height: 100%; page-break-inside: avoid">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=2><SPAN LANG="es-ES">Examen
                    CV</SPAN></FONT>
        </FONT>
    </P>
    <P LANG="es-ES" ALIGN=JUSTIFY
        STYLE="margin-left: 0.25in; text-indent: -0.25in; margin-bottom: 0in; line-height: 100%; page-break-inside: avoid">
        <BR>
    </P>
    <P ALIGN=JUSTIFY
        STYLE="margin-left: 0.25in; text-indent: -0.25in; margin-bottom: 0in; line-height: 100%; page-break-inside: avoid">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=2><SPAN LANG="es-ES">ECG:
                    <?php echo $ecg?></SPAN></FONT>
        </FONT>
    </P>
    <P LANG="es-ES" ALIGN=JUSTIFY
        STYLE="margin-left: 0.25in; text-indent: -0.25in; margin-bottom: 0in; line-height: 100%; page-break-inside: avoid">

    </P>
    <H2 LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in; page-break-before: always; text-align: center">
        <FONT FACE="Arial, sans-serif"><SPAN LANG="es-VE">PLAN:
            </SPAN></FONT>
    </H2>
    <TABLE WIDTH=510 CELLPADDING=5 CELLSPACING=0>
        <TR>
            <TD WIDTH=175 HEIGHT=10 STYLE="border: 0px solid white;">
                <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                    <FONT>
                        <FONT FACE="Calibri, sans-serif"><SPAN LANG="es-VE">Nutrición: <?php echo $meta['plan']['nutrition'] ?></SPAN>
                        </FONT>
                    </FONT>
                </P>
            </TD>
            <TD WIDTH=175 STYLE="border: 0px solid white;">
                <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                    <FONT>
                        <FONT FACE="Calibri, sans-serif">
                            <SPAN LANG="es-VE">
                                Plan de ejercicio: <?php echo $meta['plan']['exercise_plan'] ?>
                            </SPAN>
                        </FONT>
                    </FONT>
                </P>
            </TD>
        </TR>
    </TABLE>
    <H3>Exámenes paraclínicos</H3>
    <UL>
        <?php foreach($meta['plan']['clinics_exams'] as $exam): ?>
            <?php if(intval($exam['value']) ) : ?>
                <LI><?php echo $exam['name'] ?></LI>
            <?php endif ?>
        <?php endforeach ?>
    </UL>
    <P LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=2><SPAN LANG="es-VE">Plan
                    de tratamiento por tiempo indefinido: No lo debe parar sin consultar
                    a su médico</SPAN></FONT>
        </FONT>
    </P>
    <P LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in">
    </P>
    <TABLE WIDTH=500 CELLPADDING=7 CELLSPACING=0>
        <COL WIDTH=125>
        <COL WIDTH=75>
        <COL WIDTH=145>
        <TR VALIGN=TOP>
            <TD WIDTH=125
                STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                <P LANG="pt-BR" CLASS="western">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=2>Medicación</FONT>
                    </FONT>
                </P>
            </TD>
            <TD WIDTH=75
                STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                <P LANG="pt-BR" CLASS="western">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=2>Dosis</FONT>
                    </FONT>
                </P>
            </TD>
            <TD WIDTH=145 STYLE="border: 1px solid #000000; padding: 0in 0.08in">
                <P LANG="es-ES" CLASS="western">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=2><SPAN LANG="pt-BR">Intervalo
                            </SPAN></FONT>
                    </FONT>
                </P>
            </TD>
        </TR>
        <?php foreach ($meta['treatments'] as $item): ?>
        <TR VALIGN=TOP>
            <TD WIDTH=125
                STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                <P LANG="pt-BR" CLASS="western">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=2><?php echo $item['treatment'] ?></FONT>
                    </FONT>
                </P>
            </TD>
            <TD WIDTH=75
                STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.08in; padding-right: 0in">
                <P LANG="pt-BR" CLASS="western">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=2><?php echo $item['dosis'] ?></FONT>
                    </FONT>
                </P>
            </TD>
            <TD WIDTH=145 STYLE="border: 1px solid #000000; padding: 0in 0.08in">
                <P LANG="es-ES" CLASS="western">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=2><SPAN LANG="pt-BR"><?php echo $item['interval'] ?>
                            </SPAN></FONT>
                    </FONT>
                </P>
            </TD>
        </TR>
        <?php endforeach ?>
    </TABLE>
    <?php echo new Template('patients-management/recipes_and_reports/templates/report_parts/echocardiogram', $data) ?>
    <?php echo new Template('patients-management/recipes_and_reports/templates/report_parts/laboratory_exam', $data) ?>
    <?php echo new Template('patients-management/recipes_and_reports/templates/report_parts/electro_cardiogram', $data) ?>
    <?php echo new Template('patients-management/recipes_and_reports/templates/report_parts/physical_exam', $data) ?>
</BODY>

</HTML>