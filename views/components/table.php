<?php echo new Template('components/loaders/table.php') ?>
<template v-if="!loaders.table">
  <v-data-table
    :headers="headers"
    :items="rows"
    :search="search"
    :sort-by="sort_item"
    class="elevation-10"
  >
    <template v-slot:top>
      <v-toolbar flat>
        <v-text-field v-model="search" append-icon="mdi-magnify" label="Search" single-line hide-details class="mr-6"></v-text-field>
        <v-dialog v-model="dialog" max-width="500px">
          <template v-slot:activator="{ on, attrs }">
            <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
              New Item
            </v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <?php echo new Template('components/forms/'.$data['form'].'.php') ?>

          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <?php echo new Template('components/table_actions.php') ?>
    <template v-slot:no-data>
      <v-btn
        color="primary"
        @click="initialize"
      >
        Reset
      </v-btn>
    </template>
  </v-data-table>
</template>