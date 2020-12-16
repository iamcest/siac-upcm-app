	  <!-- SIDEBAR -->
    		<v-col cols="12" md="3" lg="2" class="chat_sidebar pl-4 pr-2 mt-5">
    			<v-list-item class="mt-5" href="<?php SITE_URL ?>/suite/" link>
		        <v-list-item-content>
		          <v-list-item-title>
		          	<v-icon class="primary--text">mdi-home</v-icon>
		            Regresar a la Suite
		          </v-list-item-title>
		        </v-list-item-content>
		      </v-list-item>
			    <v-list-item>
			      <v-list-item-content>
			        <v-list-item-title class="text-h6">Grupos</v-list-item-title>
			      </v-list-item-content>
			      <v-list-item-action>
              <v-icon large class="primary--text">mdi-plus</v-icon>
             </v-list-item-action>
			    </v-list-item>	
			    <v-list-item v-for="i in 4">
			      <v-list-item-content>
			        <v-list-item-title class="subtitle-1 grey--text">Chat grupal {{ i }}</v-list-item-title>
			      </v-list-item-content>
			    </v-list-item>

			    <v-list-item>
			      <v-list-item-content>
			        <v-list-item-title class="text-h6">Miembros de la unidad</v-list-item-title>
			      </v-list-item-content>			    
			    </v-list-item>	
			    <v-list-item v-for="i in 4">
			      <v-list-item-content>
			        <v-list-item-title class="subtitle-1 grey--text"><v-icon large>mdi-account-circle</v-icon> John Doe</v-list-item-title>
			      </v-list-item-content>
			      <v-list-item-action>
              <v-badge color="primary" content="6"></v-badge>
             </v-list-item-action>
			    </v-list-item>	

			    <v-list-item>
			      <v-list-item-content>
			        <v-list-item-title class="text-h6">Miembros de otras unidades</v-list-item-title>
			      </v-list-item-content>
			      <v-list-item-action>
              <v-icon large class="primary--text">mdi-plus</v-icon>
             </v-list-item-action>
			    </v-list-item>	
			    <v-list-item v-for="i in 4">
			      <v-list-item-content>
			        <v-list-item-title class="subtitle-1 grey--text"><v-icon large>mdi-account-circle</v-icon> John Doe</v-list-item-title>
			      </v-list-item-content>
			      <v-list-item-action>
              <v-badge color="primary" content="6"></v-badge>
            </v-list-item-action>
			    </v-list-item>			
    		</v-col>