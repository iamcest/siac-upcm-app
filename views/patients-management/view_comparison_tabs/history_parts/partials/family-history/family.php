<v-row>
    <v-col cols="12" md="6" lg="4" xl="3"
        v-for="family, i in comparison.history.<?php echo $item ?>.history_content.family_history" :key="i">
        <span class="font-weight-bold black--text">{{ family.relationship }}</span>
        <br>
        <span class="font-weight-bold black--text">Edad: {{ family.age }} años</span>
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
        <template v-if="family.other_diseases != ''">
            <span class="font-weight-bold black--text">Otras enfermedades</span>
            <p> {{ family.other_diseases }} </p>
        </template>
    </v-col>
</v-row>