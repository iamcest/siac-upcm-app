/*API URL*/
let date =  new Date();
const current_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
var date_options = { year: 'numeric', month: 'long', day: 'numeric' };
const api_url = window.location.origin + "/api/";
const theme_setup = {
  light: {
    primary: '#76d7d7',
    secondary: '#666',
  }
};
/*VUE PLUGINS*/
/*VUETIFY OPTIONS AND SET UP*/
const vuetify_opts = {    
  theme: {
    themes: theme_setup,
  }
};
const vuetify = new Vuetify(vuetify_opts);