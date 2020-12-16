    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row class="mt-4">
        <?php echo new Template('chat/parts/sidebar') ?>
        <v-col class="chat-container mt-6 py-0" cols="12" md="6" lg="8">
          <v-row>
            <v-col cols="12" class="pt-5 px-6 name-container">
              <v-icon x-large>mdi-account-circle</v-icon> John Doe
            </v-col>
          </v-row>
          <v-row class="chat-box px-6 grey lighten-3">
            <v-col cols="12">
              <h4 class="timeline text-center"><span>Hoy</span></h4>
            </v-col>
            <template v-for="msg in chat">
              <v-col class="mb-12 grey lighten-5 rounded-lg" v-if="msg.from != 'me'" cols="6">
                <p class="text-left">{{ msg.message }}</p>
                <p class="text-left grey--text text--lighten-1">{{ msg.time }}</p>
              </v-col>
              <v-col class="mb-12 grey lighten-2 rounded-lg" v-else cols="6" offset="6">
                <p class="text-right">{{ msg.message }}</p>
                <p class="text-right grey--text text--darken-1">{{ msg.time }}</p>
              </v-col>
            </template>
          </v-row>
            <v-col class="mb-n9 pt-0" cols="12">
              <v-form>
                <v-container>
                  <v-row>
                    <v-col class="mt-4 px-0 ml-md-n2" cols="1" xs="2">
                      <v-btn text><v-icon class="grey--text text--lighten-2" large>mdi-file-plus</v-icon></v-btn>
                    </v-col>
                    <v-col class="px-0" cols="11" xs="10">
                      <v-textarea no-resize rows="1" v-model="msg" clearable append-outer-icon="mdi-send" @keypress.enter="send" filled no-resize></v-textarea>
                    </v-col>
                  </v-row>
                </v-container>
              </v-form>
            </v-col>
        </v-col>
        <?php echo new Template('chat/parts/profile_sidebar') ?>
      </v-row>
    </v-container>
  </v-main>