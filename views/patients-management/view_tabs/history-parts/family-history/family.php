<v-row>
    <v-col cols="12" md="6" lg="4" xl="3" v-for="family in patient_history.form.history_content.family_history">
        <span class="font-weight-bold black--text">{{ family.relationship }}</span>
        <br>
        <template v-if="family.diseases.length > 0">
            <span class="font-weight-bold black--text" v-if="">Enfermedades:</span>
            <p>
                <br>
                <template v-for="disease in family.diseases">
                    - {{ disease }} <br>
                </template>
            </p>
        </template>
        <span class="font-weight-bold black--text">Otras enfermedades</span>
        <p> {{ family.other_diseases }} </p>
    </v-col>
</v-row>