/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      patients: 
      [
        {
          name: 'John Doe',
          id: 1
        },
        {
          name: 'Sam Smith',
          id: 2
        }
      ],
      genders: 
      [
        {
          gender: 'Masculino',
          abbr: 'M'
        },
        {
          gender: 'Femenino',
          abbr: 'F'
        }
      ],
      vars: {
        age: 0,
        gender: '',
        weight: 0.00,
        creatinine_serum: 0.00,
      },
    },

    computed: {
      calc () {
        var age = this.vars.age
        var gender = this.vars.gender
        var weight = this.vars.weight
        var creatinine = this.vars.creatinine_serum

        if (gender == "F") {
          var R = (140 - age) * weight * 0.85 / (72 * creatinine)
        }
        else{
          var R = (140 - age) * weight / (72 * creatinine)
        }

        var RR = Math.round(R * 100) / 100;
        if (RR > 0 && RR != Infinity) {
          return RR;
        }
        return  '';
      }        
    },

    created () {
    },

    mounted () {
    },

    methods: {

    }
});
function calcFG(form) 
{  function IsNum(str) 
{for (var i = 0; i < str.length; i++) {   var chr = str.substring(i, i+1);   if ((chr < "0" || "9" < chr) && chr != ".")return false;}return true;   }
if (!IsNum(form.Age.value)&&(form.Ht.value>=0)){ alert("Selecciona nuevamente todos los apartados antes de calcular el ClCr corregido!!!");form.Cr.value="";form.Age.value="";form.Wt.value="";return;}
{ if (!IsNum(form.Cr.value)||form.Cr.value<0.1 || form.Cr.value>10) { alert("Valor de creatinina no valida ( entre 0.1-10 mg/dl)!!!"); form.Cr.value="";return; }  

 if (!IsNum(form.Wt.value)||form.Wt.value<20 || form.Wt.value>170) { alert("Peso No valido (20-170)!!!"); form.Wt.value="";return; }   
 if (!IsNum(form.Age.value)||form.Age.value<8 || form.Age.value>110) { alert("Edad NO valida (8-110)!!!"); form.Age.value=""; return;}
 var Cr= form.Cr.value;   var Wt= form.Wt.value;   var Age= form.Age.value;   var Sex= form.Sex.value; var Ht= form.Ht.value; 
 if (Sex=="2") {R=(140-Age)* Wt *0.85/ (72*Cr);}if (Sex=="1") {R=(140-Age) * Wt / (72*Cr);}
RR=Math.round(R*100)/100; 
dR.innerHTML="<strong>ClCr:</strong> "+RR+" ml/min";
if(RR>0){form.Wt.value="Peso : "+Wt+" Kg"; form.Age.value="Edad: "+Age+" años";form.Cr.value="Cr plasma: "+Cr+" mg/dl";}

 
    if (Ht==0)
    {form.Ht.value = ""; } 
  if ((Ht>0&&Ht<80) || Ht>215) { alert("Talla No valida (80-215 cm)!!!"); return; }   
  else {bsa = Math.pow(Wt,0.425) * Math.pow(Ht,0.725) * 0.007184;CrClc = (RR * 1.73 / bsa);
  CrClc = Math.round(CrClc * 10) / 10;
  form.Ht.value = "Talla: "+Ht+" cm" ; } 
  
  if (Ht<=0){dR1.innerHTML="ClCr corregido no procede";}
   else{dR1.innerHTML="<strong>ClCr corregido:</strong>"+CrClc+" ml/min/1.73*m²";}
   dRo.innerHTML="<strong>ClCr estimado:</strong> "+CrCl+" ml/min";
 }
   
}