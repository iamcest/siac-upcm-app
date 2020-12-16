	  <!-- SIDEBAR -->
    		<v-col cols="12" md="3" lg="2" class="sidebar">
    			<v-list-item class="mt-5">
		        <v-list-item-content>
		          <v-list-item-title class="title text-center">
		            Panel
		          </v-list-item-title>
		        </v-list-item-content>
		      </v-list-item>
		      <v-list>

		        <v-list-item class="menu-item" href="<?php SITE_URL ?>/admin/upcm" link>
		        	<v-icon class="mr-1">mdi-hospital-building</v-icon>
		        	<v-list-item-title>UPCM</v-list-item-title>
		        </v-list-item>
		        <v-list-item class="menu-item" href="<?php SITE_URL ?>/admin/members" link>
		        	<v-icon class="mr-1">mdi-account</v-icon>
		        	<v-list-item-title>Miembros</v-list-item-title>
		        </v-list-item>
		        <v-list-item class="menu-item" href="<?php SITE_URL ?>/admin/announcements" link>
		        	<v-icon class="mr-1">mdi-air-horn</v-icon>
		        	<v-list-item-title>Anuncios</v-list-item-title>
		        </v-list-item>
			      <v-list-group prepend-icon="mdi-account-group" class="mb-2 menu-item">
			        <template v-slot:activator>
			          <v-list-item-title class="font-weight-normal ml-n1">SIAC Comunidad</v-list-item-title>
			        </template>

			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/admin/articles" link>
			        	<v-list-item-title>Administrar artículos</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/community" link>
			        	<v-list-item-title>Ver artículos</v-list-item-title>
			        </v-list-item>
			        
			      </v-list-group>
		        <v-list-item class="menu-item" href="<?php SITE_URL ?>/admin/profile" link>
		        	<v-icon class="mr-1">mdi-cog</v-icon>
		        	<v-list-item-title>Ajustes</v-list-item-title>
		        </v-list-item>
			    	<v-list-item class="mt-12 sub-item" href="<?php SITE_URL ?>/api/members/logout" link>
			        	<v-list-item-title class="red--text text-center">Cerrar sesión</v-list-item-title>
			      </v-list-item>
		      </v-list>    			
    		</v-col>