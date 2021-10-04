<?php if (intval($meta['laboratory_exam']['active'])): ?>
<P LANG="pt-BR" CLASS="western" STYLE="margin-bottom: 0in"><BR>
</P>
<H2 LANG="es-ES" CLASS="western" STYLE="margin-bottom: 0in; text-align: center">
    Exámenes de Laboratorio
</H2>
<TABLE WIDTH=510 CELLPADDING=5 CELLSPACING=0>
    <TR>
        <TD WIDTH=242 HEIGHT=10 STYLE="padding-top: 0in; padding-bottom: 0in; padding-left: 0.05in; padding-right: 0in">
            <P LANG="es-VE" CLASS="western" ALIGN=CENTER>
                <FONT COLOR="#000000">
                    <FONT FACE="Calibri, sans-serif">Exámen</FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=242 STYLE="padding: 0in 0.05in">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT COLOR="#000000">
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            Resultado
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
    </TR>

    <?php foreach ($meta['laboratory_exam']['items'] as $item): ?>
    <TR>
        <TD WIDTH=242 HEIGHT=10
            STYLE="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: none; padding-top: 0in; padding-bottom: 0in; padding-left: 0.05in; padding-right: 0in">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif"><SPAN LANG="es-VE"><?php echo $item['name'] ?></SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
        <TD WIDTH=242 STYLE="border: 1px solid #000000; padding: 0in 0.05in">
            <P LANG="es-ES" CLASS="western" ALIGN=CENTER>
                <FONT>
                    <FONT FACE="Calibri, sans-serif">
                        <SPAN LANG="es-VE">
                            <?php echo "{$item['results']} {$item['nomenclature']}" ?>
                        </SPAN>
                    </FONT>
                </FONT>
            </P>
        </TD>
    </TR>
    <?php endforeach ?>
</TABLE>
<?php endif ?>