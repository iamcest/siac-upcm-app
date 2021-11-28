<v-row>
    <v-col cols="12">
        <v-data-table :headers="patient_risk_factors.headers" :items="comparison.diagnostics.items.<?= $item ?>"
            sort-by="name" class="elevation-1 table_headers_lg">
            <template #no-data>
                No se encontraron resultados
            </template>
            <template #item.comment='{ item }'>
                {{ item.comment }}
                <template
                    v-if="item.name == 'HTA' 
                    || item.name == 'Dislipidemia' || item.name == 'DMt2' 
                    || item.name == 'Cardiopatía Isquémica' || item.name == 'Insuficiencia Cardíaca'  || item.name == 'Pre DMt2'">
                    <template v-if="item.diagnostic == 'Sí' && item.has_treatment == 'Sí'">
                        <v-btn color="primary" @click="comparison.diagnostics.treatment_selected = item;
                        comparison.diagnostics.treatment_view_dialog = true">Ver
                        </v-btn>
                    </template>
                </template>
            </template>
        </v-data-table>
    </v-col>
</v-row>