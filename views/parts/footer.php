<v-footer color="primary" padless>
	    <v-row justify="center" no-gutters>
	      <v-btn v-for="link in links" :key="link" color="white" text rounded class="my-2" >
	        
	      </v-btn>
	      <v-col class="white py-4 text-center" cols="12" >
	        Copyright &copy; {{ new Date().getFullYear() }} — <strong>SIAC Suite</strong>
	      </v-col>
	    </v-row>
		</v-footer>
