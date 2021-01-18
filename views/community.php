	  <!-- START AFTER THIS-->
	  <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
    	<v-row>
    		<v-col cols="12" class="p-16">
    			<h2 class="text-center">SIAC Comunidad</h2>
          <v-row>

            <v-col cols="12" md="4" sm="6" xs="12" v-for="article in filterByDate">
              <template>
                <v-card :loading="loading" class="mx-auto my-12 px-6 pt-4" max-width="400" elevation="4">

                  <v-img height="250" :src="'<?php echo SITE_URL ?>/public/img/articles/covers/'+ article.image" ></v-img>

                  <v-card-title class="grey--text grey-darken-1 font-weight-bold px-0">{{ article.title }}</v-card-title>
                  <v-card-text class="px-0 text-justify">
                    <p class="grey--text grey-lighten-3">{{ article.description }}</p>
                    <a :href="'<?php echo SITE_URL ?>/article/'+article.slug"><p class="black--text font-weight-bold"><v-icon>mdi-arrow-right</v-icon> Leer más</p></a>
                  </v-card-text>
                  <v-divider></v-divider>

                  <v-card-title class="body-2 grey--text grey-darken-1 px-0 d-flex justify-end"><v-icon>mdi-calendar-multiselect</v-icon> {{ fromNow(article.published_at) }}</v-card-title>
                </v-card>
              </template>
            </v-col>
          </v-row>
    		</v-col>
    	</v-row>
    </v-container>
  </v-main>