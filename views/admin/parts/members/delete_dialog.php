<v-dialog v-model="dialogDelete" max-width="1200px">
    <v-card>
        <v-card-title class="headline">¿Estás seguro de que quieres eliminar este
            miembro?</v-card-title>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" text @click="closeDelete">Cancelar</v-btn>
            <v-btn color="blue darken-1" text @click="deleteItemConfirm">Continuar
            </v-btn>
            <v-spacer></v-spacer>
        </v-card-actions>
    </v-card>
</v-dialog>