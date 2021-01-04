	  <!-- START AFTER THIS-->
	  <v-main>
        <!-- Provides the application the proper gutter -->
        <v-container fluid white>
        	<v-row>
    	    	<?php echo new Template('parts/sidebar') ?>

        		<v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
                <?php echo new Template('parts/upcm_logo') ?>
        			<h2>Inicio</h2>
        			<div id="calendar" class="px-4 mt-10"></div>
        		</v-col>
        	</v-row>
        </v-container>
      </v-main>