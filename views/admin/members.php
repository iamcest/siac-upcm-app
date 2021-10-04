<!-- START AFTER THIS-->
<v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
        <v-row>
            <?php echo new Template('admin/parts/sidebar') ?>
            <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
                <?php echo new Template('components/snackbar') ?>
                <h2>Miembros</h2>
                <v-row class="mt-6">
                    <v-col cols="12">
                        <v-data-table :headers="headers" :items="members" sort-by="full_name" class="elevation-1">
                            <template #top>
                                <v-toolbar flat>
                                    <v-spacer></v-spacer>
                                    <?php echo new Template('admin/parts/members/dialog') ?>
                                    <?php echo new Template('admin/parts/members/delete_dialog') ?>
                                </v-toolbar>
                            </template>
                            <template #item.actions="{ item }">
                                <v-icon md @click="editItem(item)" color="#00BFA5">
                                    mdi-pencil
                                </v-icon>
                                <v-icon md @click="deleteItem(item)" color="#F44336">
                                    mdi-delete
                                </v-icon>
                            </template>
                            <template #item.full_name="{ item }">
                                {{ item.first_name }} {{ item.last_name }}
                            </template>
                            <template #no-data>
                                <v-btn color="primary" @click="initialize">
                                    Recargar
                                </v-btn>
                            </template>
                        </v-data-table>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </v-container>
</v-main>