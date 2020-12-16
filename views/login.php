	  <!-- Sizes your content based upon application components -->
	  <v-main class="login-container">

	    <!-- Provides the application the proper gutter -->
	    <v-container fluid>

	      <v-row no-gutters class="align-center login-form-container">
		     	<v-col cols="12" md="4" class="mx-auto mt-auto" >
		        <v-sheet>
		        	<div class="d-flex flex-column justify-space-between align-center mt-5">
						    <v-img
						    	width="70%"
						      src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/public/img/Logo.png"
						    ></v-img>
						  </div>
						  <v-form class="px-10">

					      <v-row>
					        <v-col cols="12" md="12" >
					        	<span>Correo electrónico</span>
					          <v-text-field type="email" name="email" v-model="email" outlined required ></v-text-field>

					        	<label for="">Contraseña</label>
					          <v-text-field type="password" name="password" v-model="password" outlined required ></v-text-field>
					          <p class="text-right">¿Olvidaste tu contraseña?</p>
					          <div class="d-flex flex-column justify-space-between align-center mb-5">
						          <v-btn class="grey white--text py-5" :loading="loading" :disabled="email == '' || password == ''" v-on:click="login" rounded>Iniciar Sesión</v-btn>
						        </div>
						        <v-col cols="12">
									    <v-alert border="top" colored-border :color="alert_type" elevation="2" v-if="alert">
									      {{ alert_message }}
									    </v-alert>
						        </v-col>
					        </v-col>

					      </v-row>

						  </v-form>
		        </v-sheet>
		      </v-col>
	     	</v-row>
	    </v-container>
	  </v-main>
