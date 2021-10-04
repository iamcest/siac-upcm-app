<v-col cols="12" sm="6">
    <label>Nombre</label>
    <v-text-field class="mt-3" v-model="editedItem.first_name" outlined></v-text-field>
</v-col>
<v-col cols="12" sm="6">
    <label>Apellido</label>
    <v-text-field class="mt-3" v-model="editedItem.last_name" outlined></v-text-field>
</v-col>
<v-col cols="12" sm="6">
    <label>Documento de identidad</label>
    <v-select class="mt-3" v-model="editedItem.document_type" :items="document_types" item-text="text"
        item-value="value" outlined></v-select>
</v-col>
<v-col cols="12" sm="6">
    <label>N° de identificación</label>
    <v-text-field class="mt-3" v-model="editedItem.document_id" outlined></v-text-field>
</v-col>
<v-col cols="12" sm="6">
    <label>Fecha de nacimiento</label>
    <v-dialog ref="birthdate_dialog" v-model="birthdate_modal" :return-value.sync="editedItem.birthdate" width="290px">
        <template v-slot:activator="{ on, attrs }">
            <v-text-field class="mt-3" v-model="editedItem.birthdate" append-icon="mdi-calendar" readonly v-bind="attrs"
                v-on="on" outlined></v-text-field>
        </template>
        <v-date-picker v-model="editedItem.birthdate" locale="es" scrollable>
            <v-spacer></v-spacer>
            <v-btn text color="primary" @click="birthdate_modal = false">
                Cancel
            </v-btn>
            <v-btn text color="primary" @click="$refs.birthdate_dialog.save(editedItem.birthdate)">
                OK
            </v-btn>
        </v-date-picker>
    </v-dialog>
</v-col>
<v-col cols="12" sm="6">
    <label>Género</label>
    <v-select class="mt-3" v-model="editedItem.gender" :items="genders" item-text="name" item-value="gender" outlined>
    </v-select>
</v-col>
<v-col cols="12" sm="6">
    <label>Dirección</label>
    <v-text-field class="mt-3" v-model="editedItem.address" outlined></v-text-field>
</v-col>
<v-col cols="12" sm="6">
    <label>Correo electrónico</label>
    <v-text-field class="mt-3" v-model="editedItem.email" outlined></v-text-field>
</v-col>
<v-col cols="12" sm="6" md="4">
    <label>Teléfono</label>
    <vue-tel-input-vuetify id="tel-input" class="mt-3" label=""
      v-model="editedItem.telephone" mode="international" 
      :inputoptions="{showDialCode: true}"  placeholder="Ingresa un número de télefono" 
      hint="Ej: +58 4245887477" persistent-hint @input="getTelephoneInput" outlined>
    </vue-tel-input-vuetify>
</v-col>
<v-col cols="12" md="4">
    <label>Plataformas de comunicación</label>
    <v-row class="pt-0">
        <v-col cols="4" class="whatsapp-platform">
            <v-checkbox v-model="editedItem.whatsapp" :true-value="parseInt(1)" :false-value="parseInt(0)"
                prepend-icon="mdi-whatsapp"></v-checkbox>
        </v-col>
        <v-col cols="4" class="telegram-platform">
            <v-checkbox v-model="editedItem.telegram" :true-value="parseInt(1)" :false-value="parseInt(0)"
                prepend-icon="mdi-telegram"></v-checkbox>
        </v-col>
        <v-col cols="4" class="sms-platform">
            <v-checkbox v-model="editedItem.sms" :true-value="parseInt(1)" :false-value="parseInt(0)"
                prepend-icon="mdi-comment-text"></v-checkbox>

        </v-col>
    </v-row>
</v-col>
<v-col cols="12" sm="6" md="4">
    <label>Fecha de ingreso</label>
    <v-dialog ref="entry_date_dialog" v-model="entry_date_modal" :return-value.sync="editedItem.entry_date"
        width="290px">
        <template v-slot:activator="{ on, attrs }">
            <v-text-field class="mt-3" v-model="editedItem.entry_date" append-icon="mdi-calendar" readonly
                v-bind="attrs" v-on="on" outlined></v-text-field>
        </template>
        <v-date-picker v-model="editedItem.entry_date" locale="es" scrollable>
            <v-spacer></v-spacer>
            <v-btn text color="primary" @click="entry_date_modal = false">
                Cancel
            </v-btn>
            <v-btn text color="primary" @click="$refs.entry_date_dialog.save(editedItem.entry_date)">
                OK
            </v-btn>
        </v-date-picker>
    </v-dialog>
</v-col>
<v-col cols="12">
    <v-row>
        <v-col cols="12">
            <h4 class="text-h5 text-center">Redes Sociales</h4>
        </v-col>
        <v-col cols="6" md="4">
            <v-text-field v-model="editedItem.meta.instagram" prepend-icon="mdi-instagram"
                placeholder="https://www.instagram.com/user/" hint="Link de cuenta de Instagram" persistent-hint
                clearable outlined>
            </v-text-field>
        </v-col>

        <v-col cols="6" md="4">
            <v-text-field v-model="editedItem.meta.twitter" prepend-icon="mdi-twitter"
                placeholder="https://twitter.com/user" hint="Link de cuenta de Twitter" persistent-hint clearable
                outlined></v-text-field>
        </v-col>

        <v-col cols="6" md="4">
            <v-text-field v-model="editedItem.meta.facebook" prepend-icon="mdi-facebook"
                placeholder="https://facebook.com/user" hint="Link de cuenta de Facebook" persistent-hint clearable
                outlined>
            </v-text-field>
        </v-col>
    </v-row>
</v-col>
<v-col cols="12">
    <v-btn color="secondary white--text" block @click="save">
        Guardar
    </v-btn>
</v-col>