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
			      <v-list-group prepend-icon="mdi-heart-pulse" class="mb-5 menu-item">
			        <template v-slot:activator>
			          <v-list-item-title class="font-weight-normal body-1">Registro pacientes y control de la consulta</v-list-item-title>
			        </template>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/patients-management/patients" link>
			        	<v-list-item-title>Pacientes</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/patients-management/appointments" link>
			        	<v-list-item-title>Citas</v-list-item-title>
			        </v-list-item>
			      </v-list-group>
			      <v-list-group prepend-icon="mdi-calculator" class="mb-5 menu-item">
			        <template v-slot:activator>
			          <v-list-item-title class="font-weight-normal body-1">Fórmulas médicas y Algoritmos de cálculo de riesgo y diagnóstico</v-list-item-title>
			        </template>

			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/forms/body-mass-index" link>
			        	<v-list-item-title>índice Masa Corporal</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/forms/average-blood-pressure" link>
			        	<v-list-item-title>Presión Arterial Media</v-list-item-title>
			        </v-list-item>

			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/forms/pulse-pressure" link>
			        	<v-list-item-title>Presión de Pulso</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/forms/corporal-surface" link>
			        	<v-list-item-title>Superficie Corporal</v-list-item-title>
			        </v-list-item>

			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/forms/inter-heart-risk" link>
			        	<v-list-item-title>Riesgo Inter Heart</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/forms/find-risk" link>
			        	<v-list-item-title>Find Risk</v-list-item-title>
			        </v-list-item>

			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/forms/oms-ops-risk" link>
			        	<v-list-item-title>Riesgo OMS/OPS</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/forms/aha-acc-2013-risk" link>
			        	<v-list-item-title>Riesgo 2013 AHA/ACC</v-list-item-title>
			        </v-list-item>

			        <v-list-item class="pl-12 sub-item">
			        	<v-list-item-title>Conversor de unidades</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/forms/crci-cockgroft-gault" link>
			        	<v-list-item-title>CrCI Cockgroft - Gault </v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/forms/colesterol-ldl" link>
			        	<v-list-item-title>LDL-c (Fórmula de Hopkins)</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item pb-2" href="<?php SITE_URL ?>/suite/forms/dx-ecg-cornell-sokolow" link>
			        	<v-list-item-title>Dx ecg de HVI(Cornell/Sokolow L)</v-list-item-title>
			        </v-list-item>
			        <v-divider></v-divider>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/algorithms/hta-statement-treatment" link>
			        	<v-list-item-title>Tto HTA Statement SIAC</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item pb-3" href="<?php SITE_URL ?>/suite/algorithms/atherogenic-dyslipedimia-treatment" link>
			        	<v-list-item-title>Tto dislipidemia aterogénica SIAC</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/algorithms/dyslipedimia-risk-treatment" link>
			        	<v-list-item-title>Tto dislipidemia del consenso SIAC Riesgo Residual</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item">
			        	<v-list-item-title>Tto DM ADA o ALAD</v-list-item-title>
			        </v-list-item>
			      </v-list-group>
			      <v-list-item class="menu-item" href="<?php SITE_URL ?>/suite/patient-material" link>
			        <v-icon class="mr-1">mdi-file-document</v-icon>
			        <v-list-item-title class="pl-2 font-weight-normal body-1">Materiales para el paciente</v-list-item-title>
			      </v-list-item>
			      <v-list-item class="menu-item" href="<?php SITE_URL ?>/suite/updates/" link>
			        <v-icon class="mr-1">mdi-bell</v-icon>
			        <v-list-item-title class="pl-2 font-weight-normal body-1">Historial de cambios</v-list-item-title>
			      </v-list-item>
			      <v-list-item class="menu-item" href="<?php SITE_URL ?>/suite/chat/" link>
			        <v-icon class="mr-1">mdi-comment</v-icon>
							<v-list-item-title class="pl-2 font-weight-normal body-1">Chat</v-list-item-title>
			      </v-list-item>
			      <v-list-item class="menu-item" href="<?php SITE_URL ?>/community" link>
			        <v-icon class="mr-1">mdi-account-group</v-icon>
			        <v-list-item-title class="pl-2 font-weight-normal body-1">SIAC Comunidad</v-list-item-title>
			      </v-list-item>
			      <v-list-item class="menu-item" href="<?php SITE_URL ?>/suite/notifications/" link>
			      	<v-icon class="mr-1">mdi-air-horn</v-icon>
			        <v-list-item-title class="pl-2 font-weight-normal body-1">Notificaciones</v-list-item-title>
			      </v-list-item>
			      <?php if ($_SESSION['user_type'] == 'coordinador'): ?>
			      <v-list-group prepend-icon="mdi-hospital-building" class="menu-item">
			        <template v-slot:activator>
			          <v-list-item-title class="font-weight-normal body-1">Administrar UPCM</v-list-item-title>
			        </template>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/suite-management/members" link>
			        	<v-list-item-title>Miembros</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/suite-management/upcm-information" link>
			        	<v-list-item-title>Información de UPCM</v-list-item-title>
			        </v-list-item>
			      </v-list-group>
			      <?php endif ?>
			      <v-list-group prepend-icon="mdi-cog" class="menu-item">
			        <template v-slot:activator>
			          <v-list-item-title class="font-weight-normal body-1">Ajustes</v-list-item-title>
			        </template>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/settings/profile" link>
			        	<v-list-item-title>Perfil</v-list-item-title>
			        </v-list-item>
			        <v-list-item class="pl-12 sub-item" href="<?php SITE_URL ?>/suite/settings/email" link>
			        	<v-list-item-title>Correo</v-list-item-title>
			        </v-list-item>
			      </v-list-group>
			    	<v-list-item class="mt-12 sub-item" href="<?php SITE_URL ?>/api/members/logout" link>
			        	<v-list-item-title class="red--text text-center">Cerrar sesión</v-list-item-title>
			      </v-list-item>
		      </v-list>    			
    		</v-col>