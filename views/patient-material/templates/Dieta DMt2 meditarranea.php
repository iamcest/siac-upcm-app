<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>

<HEAD>
    <STYLE TYPE="text/css">
    <!--
    @page {
        size: 8.5in 11in;
        margin-right: 0.53in;
        margin-top: 0.2in;
        margin-bottom: 0.28in
    }

    P {
        margin-bottom: 0.08in;
        direction: ltr;
        color: #000000;
        line-height: 115%;
        widows: 2;
        orphans: 2
    }

    P.western {
        font-family: "Calibri", sans-serif;
        font-size: 11pt;
        so-language: es-CL
    }

    P.cjk {
        font-family: "Calibri", sans-serif;
        font-size: 11pt
    }

    P.ctl {
        font-family: "Times New Roman", serif;
        font-size: 11pt;
        so-language: ar-SA
    }

    H3 {
        margin-bottom: 0.04in;
        direction: ltr;
        color: #000000;
        line-height: 115%;
        widows: 2;
        orphans: 2
    }

    H3.western {
        font-family: "Calibri Light", sans-serif;
        font-size: 13pt;
        so-language: es-CL
    }

    H3.cjk {
        font-family: "Times New Roman", serif;
        font-size: 13pt
    }

    H3.ctl {
        font-family: "Times New Roman", serif;
        font-size: 13pt;
        so-language: ar-SA
    }

    A:link {
        color: #0563c1
    }
    -->
    </STYLE>
</HEAD>

<BODY LANG="en-US" TEXT="#000000" LINK="#0563c1" DIR="LTR">
    <DIV TYPE=HEADER>
        <DIV style="width:25%;display:flex; justify-content:start">
            <img src="<?php echo DIRECTORY; ?>/public/img/upcms-logo/<?php echo $_SESSION['upcm_logo']; ?>"
                class="col-6" width="200px">
        </DIV>
        <P LANG="es-MX" ALIGN=CENTER>
            <FONT FACE="Americana, serif">
                <FONT SIZE=3><B><?php echo $_SESSION['gender'] == 'M' ? 'Dr.' : 'Dra.' ?>
                        <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></B></FONT>
            </FONT>
        </P>
        <P LANG="es-MX" ALIGN=CENTER>
            <FONT FACE="Americana, serif">
                <FONT SIZE=3><B>Cardiología
                        – Medicina Interna</B></FONT>
            </FONT>
        </P>
        <P LANG="es-MX" ALIGN=CENTER STYLE="margin-bottom: 0.45in">
            <FONT FACE="Americana, serif">
                <FONT SIZE=3><B><?php echo $_SESSION['upcm_name'] ?></B></FONT>
            </FONT>
        </P>
    </DIV>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt"><B>Recomendaciones de Alimentación</B></FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%"><BR>
    </P>
    <UL>
        <LI>
            <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt"><U><B>Evite
                                el azucar a toda costa- reduzca las cantidades de harina y de dulces</B></U></FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt"><U><B>No
                                ingiera alimento enlatados o procesados ( sopa de sobre, jugos
                                delata o de carton, etc)</B></U></FONT>
                </FONT>
            </P>
    </UL>
    <UL>
        <LI>
            <P LANG="es-VE" CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Evita
                        a toda costa las preparaciones fritas de las comidas, prohibido
                        comer harinas fritas, no utilices nunca los aceites refritos.</FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-VE" CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Puedes
                        utilizar preferiblemente aceite de oliva o de maíz.</FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-VE" CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Trata
                        de comer primero las ensaladas </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-VE" CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Evita
                        las cremas, preferiblemente toma consomés o sopas sin leche. </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-VE" CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Escoja
                        los cereales que contengan más de 3 gramos de fibra por 100 gr,
                        para aumentar el contenido de fibra, añada pocas cucharadas de un
                        cereal con afrecho, rico en fibras, a su cereal favorito.</FONT>
                </FONT>
            </P>
    </UL>
    <UL>
        <LI>
            <P LANG="es-VE" CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Escoja
                        bebidas sin azucares (sin calorías) con las comidas. Las bebidas
                        azucaradas añaden calorías sin nutrir.</FONT>
                </FONT>
            </P>
    </UL>
    <UL>
        <LI>
            <H3 LANG="es-CL" CLASS="western" ALIGN=JUSTIFY
                STYLE="margin-top: 0in; margin-bottom: 0in; font-weight: normal; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt"><I>Siéntase
                            libre para cambiar cualquier desayuno, almuerzo, cena o merienda
                            dentro de este menú que sean de su preferencia o de su
                            conveniencia.</I></FONT>
                </FONT>
            </H3>
    </UL>
    <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 100%">
        <FONT FACE="Tahoma, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt"><SPAN LANG="es-VE"><U><B>FRUTAS
                            Y VEGETALES QUE debes evitar</B></U></SPAN></FONT>
        </FONT>
        <FONT FACE="Tahoma, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt"><SPAN LANG="es-VE">:</SPAN></FONT>
        </FONT>
    </P>
    <UL>
        <LI>
            <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Mango</FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Guayaba</FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Cambur</FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Níspero</FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Uva</FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Zanahoria</FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Remolacha</FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Papa</FONT>
                </FONT>
            </P>
    </UL>
    <UL>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Tahoma, sans-serif"><SPAN LANG="es-VE"><I><B>Es
                                preferible </B></I></SPAN></FONT>
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=4><SPAN LANG="es-VE"><I><B>NO</B></I></SPAN></FONT>
                </FONT>
                <FONT FACE="Tahoma, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt"><SPAN LANG="es-VE"><I><B>
                                    COMER HARINAS: PASTA, PAN O AREPA DESPUES DEL MEDIODÍA. </B></I></SPAN></FONT>
                </FONT>
            </P>
    </UL>
    <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 100%">
        <BR><BR>
    </P>
    <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 100%">
        <FONT FACE="Tahoma, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt"><I><B>Debes
                        hacer ejercicio todos los dias por lo menos 30 minutos de caminata,
                        trote, bailoterapia etc….</B></I></FONT>
        </FONT>
    </P>
    <P LANG="es-VE" CLASS="western" STYLE="margin-bottom: 0.14in; line-height: 100%">
        <BR><BR>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt"><U><B>RECOMENDACIONES
                        NUTRICIONALES:</B></U></FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">Utilizar
                aceites mas saludables como maíz, soya, idealmente de oliva virgen
                para cocinar como en crudo. </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">Evitar
                la reutilización de los aceites.</FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">Asegurar
                3 frutas al día mínimo (preferentemente piezas enteras antes que
                jugos</FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">naturales)
                y 2 lácteos desnatados al día (desnatados 0% preferiblemente).</FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">Utilizar
                técnicas culinarias que no aporten demasiada grasa: plancha, asado,
                horno,</FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">microondas,
                vapor, papillote… Evitar las frituras, empanados o rebozados.</FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">Emplear
                condimentos naturales para cocinar (pimienta, pimentón, ajo,
                vinagre, comino Limón . </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">Controlar
                la cantidad de sal para cocinar (menos de 3g/día: una cucharadita
                rasa de té)</FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%"> <U>
        </U>
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt"><I><U><B>Evitar
                            totalmente consumir: Bebidas con azúcar añadida ( Refrescos, alta,
                            jugos de pote etc) </B></U></I></FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">Además:
            </FONT>
        </FONT>
    </P>
    <UL>
        <LI>
            <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Arial, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Evita
                        el exceso de alcohol</FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
                <FONT FACE="Arial, sans-serif">
                    <FONT SIZE=1 STYLE="font-size: 8pt">Consume
                        la menor cantidad posible de Embutidos y fiambres con alto contenido
                        en grasa y/o sal: embutidos (salchichón,</FONT>
                </FONT>
            </P>
    </UL>
    <P LANG="es-CL" STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">Chorizo
                fiambre (chopped, mortadela,…), albóndigas, salchichas, vísceras…</FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-left: 0.49in; text-indent: -0.49in; margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">Evita
                Productos procesados por su alto contenido en azúcares simples,
                grasas y/o sal: cereales enriquecidos, galletas, ,
                salsas comerciales (kétchup,</FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-left: 0.49in; text-indent: -0.49in; margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">mayonesa,…),
                mantequillas, margarinas, productos precocinados (lasañas, frituras, pizzas…)</FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt">Debes
                Tomar 1,5 o 2 Litros de agua al día (8 vasos/día), </FONT>
        </FONT>
    </P>

    <P LANG="es-CL" CLASS="western"
        STYLE="margin-top: 0.21in; margin-bottom: 0.1in; background: #ffffff; line-height: 100%">
        <FONT COLOR="#545454">
            <FONT FACE="Arial, sans-serif">
                <FONT SIZE=1 STYLE="font-size: 8pt">Los
                    14 puntos que definen la dieta mediterránea</FONT>
            </FONT>
        </FONT>
    </P>
    <OL>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">El
                            uso de aceites saludables como maíz, soya y de oliva virgen extra
                            como única grasa culinaria, incluso para freír.<BR>&nbsp;</FONT>
                    </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Consumir,
                            en total, cuatro cucharadas soperas de aceite saludable al día<BR>&nbsp;</FONT>
                    </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Tomar
                            dos raciones diarias de verdura, preferiblemente fresca y en
                            ensalada.<BR>&nbsp;</FONT>
                    </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Ingerir
                            tres o más raciones, de unos 30 gramos, de frutos secos a la
                            semana.<BR>&nbsp;</FONT>
                    </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Tomar
                            tres o más raciones de granos a la semana.<BR>&nbsp;</FONT>
                    </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Consumir
                            pescado tres veces a la semana NUNCA FRITO </FONT>
                    </FONT>
                </FONT>
            </P>
    </OL>
    <OL START=7>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737"> </FONT>
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Consumir
                            las carnes rojas solo 2- 3 veces a la semana .<BR>&nbsp;</FONT>
                    </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Comer
                            ave 2- 3 veces a la semana </FONT>
                    </FONT>
                </FONT>
            </P>
    </OL>
    <OL START=9>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Evitar
                            totalmente las bebidas azucaradas y carbonatadas.<BR>&nbsp;</FONT>
                    </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Reducir
                            la mantequilla, la nata y la margarina.<BR>&nbsp;</FONT>
                    </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Evitar
                            las harinas: pan, arepa, galletas, pasta . Si acaso, consumirlas
                            dos veces por semana y nunca después del mediodía .<BR>&nbsp;</FONT>
                    </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Si
                            se consume alcohol, tomar una copa de vino tinto todos los días. En
                            el caso de las personas abstemias, no se invita a que empiecen a
                            hacerlo.<BR>&nbsp;</FONT>
                    </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Aumenta
                            la fibra y consume leche desgrasada.<BR>&nbsp;</FONT>
                    </FONT>
                </FONT>
            </P>
        <LI>
            <P LANG="es-CL" CLASS="western" STYLE="margin-bottom: 0in; background: #ffffff; line-height: 100%">
                <FONT COLOR="#373737">
                    <FONT FACE="Arial, sans-serif">
                        <FONT SIZE=1 STYLE="font-size: 8pt">Consumir
                            tres o más piezas de vegetales y dos de fruta al día </FONT>
                    </FONT>
                </FONT>
            </P>
    </OL>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%"><BR>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1><B>Definiciones
                </B></FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>CEREALES
                Pan, arroz, pastas, cereales, galletas (preferible integrales) Pasta
                elaborada con huevo Bollería en general (croissants, ensaimadas,
                magdalenas) FRUTAS, VERDURAS Y </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>LEGUMBRES,
                vegetales y granos especialmente recomendadas Aguacate,
                remolacha, celery, yuca, batata ,o papas pueden ser fritas en un
                aceite adecuado. TODOS LOS GRANOS </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>HUEVOS,
                LECHE Y DERIVADOS recomendados </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>Leche
                y yogur desnatado, productos comerciales elaborados con leche
                descremada o semi descremada Queso fresco o con bajo contenido en
                grasas, bajo en sal. </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>PESCADO
                Y MARISCO Pescado de cualquier tipo, blanco y azul, atún en lata
                en agua , mariscos de concha fresco o en lata. Sardinas naturales o
                en lata, No recomendados Huevas de pescado, </FONT>
        </FONT>
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1><B>pescado
                    frito en aceites o grasas</B></FONT>
        </FONT>
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>.
            </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>CARNES
                Y AVES Pollo y pavo sin piel, conejo. Ternera, vaca, cerdo bajo
                en grasa y sin grasa o poca grasa. Evitar Embutidos en general,
                tocineta, hamburguesas comerciales, salchichas, salchichas de pollo o
                ternera, vísceras, pato, , paté. </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>ACEITES
                Y GRASAS De oliva, maíz, soya, y girasol evitar Margarinas
                vegetales es preferible mantequilla, evitar totalmente manteca de
                cerdo, tocino, aceite de palma y coco. </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>POSTRES
                Postres que sean caseros y con leche descremada, sorbetes, evitar
                fruta en almíbar. Chocolate con mas de 70% de cacao es el mejor,
                puedes comer diariamente. </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>FRUTOS
                SECOS Mani, pistacho, merey, </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>.
                ESPECIAS Y SALSAS Utilizar comino, ajo, pimienta, mostaza,
                hierbas, vinagreta . Aliño de ensalada pobre en grasas, </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>BEBIDAS
                preferir por sobre todo Agua y jugos naturales sin azúcar máximo
                un vaso al día </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1>,
                infusiones. Café, té. Refrescos azucarados, bebidas alcohólicas
                con moderación. </FONT>
        </FONT>
    </P>
    <P LANG="es-CL" STYLE="margin-bottom: 0in; line-height: 100%">
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1><B>ELIMINA
                    TOTALMENTE LAS BEBIDAS AZUCARADAS REF</B></FONT>
        </FONT>
        <FONT FACE="Arial, sans-serif">
            <FONT SIZE=1 STYLE="font-size: 8pt"><B>RESCOS,
                    JUGOS DE POTE, MALTA ETC </B></FONT>
        </FONT>
    </P>
    <DIV TYPE=FOOTER>
        <P LANG="es-CL" STYLE="margin-top: 0.47in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="Bahnschrift SemiBold SemiConden, sans-serif"><SPAN LANG="en-US"><?php echo !empty($_SESSION['telephone']) ?
"Tel: {$_SESSION['telephone']}" : ''
?> Email:</SPAN></FONT>
            <FONT COLOR="#0563c1"><U><A HREF="mailto:<?php echo $_SESSION['email'] ?>">
                        <FONT FACE="Bahnschrift SemiBold SemiConden, sans-serif"><SPAN
                                LANG="en-US"><?php echo $_SESSION['email'] ?></SPAN></FONT>
                    </A></U></FONT>
        </P>
    </DIV>
</BODY>

</HTML>