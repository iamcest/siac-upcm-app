<v-card-text>
    <v-container>
        <v-row>
            <v-col cols="12" sm="6" md="6">
                <v-text-field v-model="editedItem.first_name" label="First Name"></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="6">
                <v-text-field v-model="editedItem.last_name" label="Last Name"></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="12">
                <v-text-field v-model="editedItem.email" label="Email"></v-text-field>
            </v-col>
            <v-col cols="12" sm="6" md="12">
                <template>
                    <v-select v-model="editedItem.rank" :items="ranks" item-text="name" item-value="value"
                        label="Member Rank"></v-select>
                </template>
            </v-col>
            <v-col cols="12" sm="6" md="12">
                <template>
                    <v-menu ref="menu" v-model="menu" :close-on-content-click="false"
                        :return-value.sync="editedItem.birthdate" transition="scale-transition" offset-y
                        min-width="290px">
                        <template #activator="{ on, attrs }">
                            <v-text-field v-model="editedItem.birthdate" label="Birthdate" readonly
                                v-bind="attrs" v-on="on">
                                <template #append>
                                    <v-icon v-bind="attrs" v-on="on">mdi-calendar</v-icon>
                                </template>
                            </v-text-field>
                        </template>
                        <v-date-picker v-model="editedItem.birthdate" no-title scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="menu = false">
                                Cancel
                            </v-btn>
                            <v-btn text color="primary" @click="$refs.menu.save(editedItem.birthdate)">
                                OK
                            </v-btn>
                        </v-date-picker>
                    </v-menu>
                </template>
            </v-col>
        </v-row>
    </v-container>
</v-card-text>

<?php echo new Template('components/forms/actions.php') ?>