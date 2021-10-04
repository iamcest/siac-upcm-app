<?php if (intval($meta['physical_exam']['active']) ) : ?>
<P LANG="pt-BR" CLASS="western" STYLE="margin-bottom: 0in;">
</P>
<H2 LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in; text-align: center">
    Exámen Físico
</H2>
<H3>Aspecto General: <?php echo $meta['physical_exam']['item']['general_aspect'] ?></H3>
<HR>
<H3>PVY</H3>
<TABLE WIDTH=510 CELLPADDING=5 CELLSPACING=0>
    <TR>
        <TD WIDTH=120 HEIGHT=10 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Seno X: <?php echo $meta['physical_exam']['item']['pvy']['morphology_breastx'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=120 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            CVY: <?php echo $meta['physical_exam']['item']['pvy']['cvy'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=120 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Tope Oscilante: <?php echo $meta['physical_exam']['item']['pvy']['swivel_stop'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=120 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Otro: <?php echo $meta['physical_exam']['item']['pvy']['other'] ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
    </TR>
</TABLE>
<HR>
<H3>Latidos carotídeos</H3>
<TABLE WIDTH=510 CELLPADDING=5 CELLSPACING=0>
    <TR>
        <TD WIDTH=150 HEIGHT=10 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Simétricos: <?php echo $meta['physical_exam']['item']['carotid_beats']['symmetrical'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=150 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Homócroto: <?php echo $meta['physical_exam']['item']['carotid_beats']['homochroto'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=150 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                        Amplitud normal: <?php echo $meta['physical_exam']['item']['carotid_beats']['normal_amplitude'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
    </TR>
</TABLE>
<HR>
<H3>Apéx</H3>
<TABLE WIDTH=510 CELLPADDING=5 CELLSPACING=0>
    <TR>
        <TD WIDTH=150 HEIGHT=10 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Se palpa: <?php echo $meta['physical_exam']['item']['apex']['is_palpated'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=150 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Desplazado: <?php echo $meta['physical_exam']['item']['apex']['displaced'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=150 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Característica: <?php echo $meta['physical_exam']['item']['apex']['characteristic'] ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
    </TR>
</TABLE>
<HR>
<H3>Auscultación</H3>
<TABLE WIDTH=510 CELLPADDING=5 CELLSPACING=0>
    <TR>
        <TD WIDTH=120 HEIGHT=10 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Regulares: <?php echo $meta['physical_exam']['item']['auscultation']['regular'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=120 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            R1: <?php echo $meta['physical_exam']['item']['auscultation']['unfolded_r1'] ? 'Sí' : 'No' ?>
                            <?php if($meta['physical_exam']['item']['auscultation']['unfolded_r1']): ?>

                            <?php echo !empty($meta['physical_exam']['item']['auscultation']['r1_type']) ? 
                                $meta['physical_exam']['item']['auscultation']['r1_type'] : '' 
                            ?>

                            <?php endif ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=120 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            R2: <?php echo $meta['physical_exam']['item']['auscultation']['unfolded_r2'] ? 'Sí' : 'No' ?>
                            <?php if($meta['physical_exam']['item']['auscultation']['unfolded_r2']): ?>

                            <?php echo !empty($meta['physical_exam']['item']['auscultation']['r2_type']) ? 
                                $meta['physical_exam']['item']['auscultation']['r2_type'] : '' 
                            ?>
                            
                            <?php endif ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>  
        <TD WIDTH=120 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            R3: <?php echo $meta['physical_exam']['item']['auscultation']['unfolded_r3'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
    </TR>
</TABLE>
<TABLE WIDTH=510 CELLPADDING=5 CELLSPACING=0>
    <TR>
        <TD WIDTH=120 HEIGHT=10 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            R4: <?php echo $meta['physical_exam']['item']['auscultation']['unfolded_r4'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <?php if (count($meta['physical_exam']['item']['auscultation']['soplo']['items']) == 1) : ?>
        <TD WIDTH=120 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Ritmo de galope: <?php echo $meta['physical_exam']['item']['auscultation']['gallop_rhythm'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <?php endif ?>
        <TD WIDTH=120 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Soplo: <?php echo $meta['physical_exam']['item']['auscultation']['soplo']['active'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
    </TR>
</TABLE>
<?php if($meta['physical_exam']['item']['auscultation']['soplo']['active']) : ?>
    <?php for ($i=0; $i < count($meta['physical_exam']['item']['auscultation']['soplo']['items']); $i++): ?>
    <h4>Soplo <?php echo $i + 1 ?></h4>
    <TABLE WIDTH=510 CELLPADDING=5 CELLSPACING=0>
        
        <TR>
            <TD WIDTH=120 HEIGHT=10 STYLE="border: 0px solid white;">
                <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                    <FONT>
                        <FONT FACE="Calibri, sans-serif">
                            <SPAN LANG="es-VE">
                                Tipo: <?php echo $meta['physical_exam']['item']['auscultation']['soplo']['items'][$i]['type'] ?>
                            </SPAN>
                        </FONT>
                    </FONT>
                </P>
            </TD>
            <TD WIDTH=120 STYLE="border: 0px solid white;">
                <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                    <FONT>
                        <FONT FACE="Calibri, sans-serif">
                            <SPAN LANG="es-VE">
                                Foco: <?php echo $meta['physical_exam']['item']['auscultation']['soplo']['items'][$i]['foco'] ?>
                            </SPAN>
                        </FONT>
                    </FONT>
                </P>
            </TD>
            
            <TD WIDTH=120 STYLE="border: 0px solid white;">
                <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                    <FONT>
                        <FONT FACE="Calibri, sans-serif">
                            <SPAN LANG="es-VE">
                                Intensidad: <?php echo $meta['physical_exam']['item']['auscultation']['soplo']['items'][$i]['intensity_foco'] ?>
                            </SPAN>
                        </FONT>
                    </FONT>
                </P>
            </TD>
        </TR>
    </TABLE>
    <?php endfor ?>
<?php endif ?>
<HR>
<H3>Pulsos Periféricos</H3>
<TABLE WIDTH=510 CELLPADDING=5 CELLSPACING=0>
    <TR>
        <TD WIDTH=120 HEIGHT=10 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Simétricos: <?php echo $meta['physical_exam']['item']['peripheral_pulses']['symmetrical'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <?php if($meta['physical_exam']['item']['peripheral_pulses']['symmetrical']) : ?>
            <TD WIDTH=120 STYLE="border: 0px solid white;">
                <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                    <FONT>
                        <FONT FACE="Calibri, sans-serif">
                            <SPAN LANG="es-VE">
                                MI: <?php echo $meta['physical_exam']['item']['peripheral_pulses']['symmetrical_range'] ?>
                            </SPAN>
                        </FONT>
                    </FONT>
                </P>
            </TD>
        <?php else: ?>
        <TD WIDTH=120 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            MID: <?php echo $meta['physical_exam']['item']['peripheral_pulses']['mid'] ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=120 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            MII: <?php echo $meta['physical_exam']['item']['peripheral_pulses']['mii'] ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <?php endif ?>
        
    </TR>
</TABLE>
<HR>
<H3>Edema miembros inferiores</H3>
<TABLE WIDTH=510 CELLPADDING=5 CELLSPACING=0>
    <TR>
        <TD WIDTH=150 HEIGHT=10 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            <?php echo $meta['physical_exam']['item']['edema']['active'] ? 'Sí' : 'No' ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <?php if($meta['physical_exam']['item']['edema']['active']) : ?>
        <TD WIDTH=150 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Homócroto: <?php echo $meta['physical_exam']['item']['edema']['range'] ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <?php endif ?>
    </TR>
</TABLE>
<?php endif ?>