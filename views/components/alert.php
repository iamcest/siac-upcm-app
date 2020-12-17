    
    <v-col cols="12">
	    <v-alert border="top" colored-border :color="alert_type" elevation="2" v-if="alert">
	      {{ alert_message }}
	    </v-alert>
    </v-col>