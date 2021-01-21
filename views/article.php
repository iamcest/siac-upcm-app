	  
    <!-- START AFTER THIS-->
	  <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
    	<v-row>
    		<v-col cols="12" class="p-16">
          <v-row>
            <v-col cols="6" offset-md="3">
              <v-img src="<?php echo SITE_URL ?>/public/img/articles/covers/<?php echo $data['image'] ?>" width="100%"></v-img>            
            </v-col>
            <v-col cols="6" offset-md="3">
        			<h1 class="text-center"><?php echo $data['title'] ?></h1>
            </v-col>
            <v-col class="ql-editor" cols="6" offset-md="3">
              <?php echo $data['content'] ?>
            </v-col>
          </v-row>
    		</v-col>
    	</v-row>
    </v-container>
  </v-main>
