<v-col cols="12">
    <v-data-table :headers="upcm_invitations.headers" :items="upcm_invitations.items" class="elevation-1">
        <template #top>
            <v-toolbar flat>
                <v-toolbar-title>
                    Invitaciones enviadas
                </v-toolbar-title>
                <v-spacer></v-spacer>
            </v-toolbar>
        </template>
        <template #item.full_name="{ item }">
            {{ item.first_name + ' ' + item.last_name }}
        </template>
        <template #item.actions="{ item }">
            <v-tooltip top>
                <template #activator="{ on, attrs }">
                    <v-icon md class="mr-2"
                        @click="copyToClipboard('<?php echo SITE_URL?>/register/?invitation_code=' + item.invitation_code)"
                        color="primary" v-bind="attrs" v-on="on">
                        mdi-content-copy
                    </v-icon>
                </template>
                <span>Copiar invitación</span>
            </v-tooltip>
            <v-icon md class="mr-2" @click="deleteInvitation(item)" color="error">
                mdi-trash-can
            </v-icon>
        </template>
        <template #no-data>
            No se encontraron invitaciones enviadas
        </template>
    </v-data-table>
</v-col>