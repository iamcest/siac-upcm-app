<?php if (intval($meta['electro_cardiogram']['active']) ) : ?>
<P LANG="pt-BR" CLASS="western" STYLE="margin-bottom: 0in;"><BR>
</P>
<H2 LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in; text-align: center">
    Electro Cardiograma
</H2>
<TABLE WIDTH=510 CELLPADDING=5 CELLSPACING=0>
    <TR>
        <TD WIDTH=175 HEIGHT=10 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif"><SPAN LANG="es-VE">Ritmo: <?php echo $meta['electro_cardiogram']['item']['rhythm'] ?></SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=175 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Frecuencia: <?php echo $meta['electro_cardiogram']['item']['frecuency'] ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=175 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            PR: <?php echo $meta['electro_cardiogram']['item']['pr'] ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
    </TR>
</TABLE>
<H3 LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in; text-align: center">
    Ejes
</H3>
<TABLE WIDTH=510 CELLPADDING=5 CELLSPACING=0>
    <TR>
        <TD WIDTH=120 HEIGHT=10 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif"><SPAN LANG="es-VE">P: <?php echo $meta['electro_cardiogram']['item']['axes']['p'] ?></SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=120 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            T: <?php echo $meta['electro_cardiogram']['item']['axes']['t'] ?>
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
                            QT: <?php echo $meta['electro_cardiogram']['item']['qt'] ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
    </TR>
    <TR>
        <TD WIDTH=120 STYLE="border: 0px solid white;">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            QTc: <?php echo $meta['electro_cardiogram']['item']['qtc_formula_selected']['text'] ?> 
                            <?php echo $meta['electro_cardiogram']['item'][$meta['electro_cardiogram']['item']['qtc_formula_selected']['value']] ?>
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
                            Diagnóstico: <?php echo $meta['electro_cardiogram']['item']['diagnostic'] ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
    </TR>
</TABLE>
<?php endif ?>