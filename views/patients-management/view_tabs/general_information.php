<?php if (!empty($can_manage_suite) 
|| !empty($access['patient_management_access']['sections'][0]['permissions']['create'])
|| !empty($access['patient_management_access']['sections'][0]['permissions']['update']) ): ?>
<v-col class="d-flex justify-end" cols="12">
    <v-btn color="#00BFA5" @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false" dark>Editar</v-btn>
</v-col>
<?php endif ?>
<v-col cols="12" sm="6" md="4">
    <p class="black--text text-h6"><strong>Documento de identidad:</strong> <span
            class="font-weight-light">{{ editedItem.document_type }}</span></p>
</v-col>
<v-col cols="12" sm="6" md="4">
    <p class="black--text text-h6"><strong>N° de identificación:</strong> <span
            class="font-weight-light">{{ editedItem.document_id }}</span></p>
</v-col>
<v-col cols="12" sm="6" md="2">
    <p class="black--text text-h6"><strong>Fecha de nacimiento:</strong> <span
            class="font-weight-light">{{ editedItem.birthdate }}</span></p>
</v-col>
<v-col cols="12" sm="6" md="2">
    <p class="black--text text-h6"><strong>Edad:</strong> <span
            class="font-weight-light">{{ getTimeDiff(editedItem.birthdate) }} años</span></p>
</v-col>
<v-col cols="12" sm="6" md="4">
    <p class="black--text text-h6"><strong>Género:</strong>
        <span class="font-weight-light" v-if="editedItem.gender == 'F'">Femenino</span>
        <span class="font-weight-light" v-if="editedItem.gender == 'M'">Masculino</span>
    </p>
</v-col>
<v-col cols="12" sm="6" md="4">
    <p class="black--text text-h6"><strong>Dirección:</strong> <span
            class="font-weight-light">{{ editedItem.address }}</span></p>
</v-col>
<v-col cols="12" sm="6" md="4">
    <p class="black--text text-h6"><strong>Correo electrónico:</strong> <span
            class="font-weight-light">{{ editedItem.email }}</span></p>
</v-col>
<v-col cols="12" sm="6" md="4">
    <p class="black--text text-h6"><strong>Teléfono:</strong> <span
            class="font-weight-light">{{ editedItem.telephone }}</span></p>
</v-col>
<v-col cols="12" md="4">
    <p class="black--text text-h6"><strong>Plataformas de comunicación:</strong></p>
    <v-row class="pt-0">
        <v-col cols="4" class="whatsapp-platform">
            <v-icon>mdi-whatsapp</v-icon>
            <v-icon class="green--text" v-if="editedItem.whatsapp">mdi-check</v-icon>
            <v-icon class="red--text" v-else>mdi-close</v-icon>
        </v-col>
        <v-col cols="4" class="telegram-platform">
            <v-icon>mdi-telegram</v-icon>
            <v-icon class="green--text" v-if="editedItem.telegram">mdi-check</v-icon>
            <v-icon class="red--text" v-else>mdi-close</v-icon>
        </v-col>
        <v-col cols="4" class="sms-platform">
            <v-icon>mdi-comment-text</v-icon>
            <v-icon class="green--text" v-if="editedItem.sms">mdi-check</v-icon>
            <v-icon class="red--text" v-else>mdi-close</v-icon>
        </v-col>
    </v-row>
</v-col>
<v-col cols="12" md="4"
    v-if="editedItem.meta.instagram != '' || editedItem.meta.twitter != '' || editedItem.meta.facebook != ''">
    <v-row class="px-0">
        <v-col class="mt-n4" cols="12">
            <span class="black--text text-h6">Redes sociales:
                <v-btn :href="editedItem.meta.instagram" color="#E1306C" v-if="editedItem.meta.hasOwnProperty('instagram') && editedItem.meta.instagram != ''" text
                    small fab>
                    <v-icon>mdi-instagram</v-icon>
                </v-btn>
                <v-btn :href="editedItem.meta.twitter" color="#00acee" v-if="editedItem.meta.hasOwnProperty('twitter') && editedItem.meta.twitter != ''" text small
                    fab>
                    <v-icon>mdi-twitter</v-icon>
                </v-btn>
                <v-btn :href="editedItem.meta.facebook" color="#3b5998" v-if="editedItem.meta.hasOwnProperty('facebook') && editedItem.meta.facebook != ''" text small
                    fab>
                    <v-icon>mdi-facebook</v-icon>
                </v-btn>
            </span>
        </v-col>
    </v-row>
</v-col>
<v-col cols="12" sm="6" md="4">
    <p class="black--text text-h6"><strong>Fecha de ingreso:</strong> <span
            class="font-weight-light">{{ editedItem.entry_date }}</span></p>
</v-col>