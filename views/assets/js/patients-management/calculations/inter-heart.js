var inter_heart_vars = {
  european_score: [
    {
      region: 'Sudeste asiático',
      factor: 1.4
    },
    {
      region: 'África Subsahariana',
      factor: 1.3
    },
    {
      region: 'Caribe',
      factor: 1.3
    },
    {
      region: 'Asia Occidental',
      factor: 1.2
    },
    {
      region: 'Norte de África',
      factor: 0.9
    },
    {
      region: 'Asia Oriental',
      factor: 0.7
    },
    {
      region: 'Ámerica del Sur',
      factor: 0.7000000000000001
    },
  ],
  genders: [
    {
      gender: 'Masculino',
      abbr: 'M'
    },
    {
      gender: 'Femenino',
      abbr: 'F'
    }
  ],
  smoking_options: [
    {
      text: 'Nunca fumó',
      val: 0,
    },
    {
      text: 'Exfumador',
      val: 2,
    },
    {
      text: 'Fumador actual o en los últimos 12 meses',
      val: 'Fumador actual',
    },
  ],
  smoking_amount: [
    {
      text: '1.5 cig/d',
      val: 2,
    },
    {
      text: '6 a 10 cig/d',
      val: 4,
    },
    {
      text: '11 a 15 cig/d',
      val: 6,
    },
    {
      text: '16 a 20 cig/d',
      val: 7,
    },
    {
      text: '> 20 cig/d',
      val: 11,
    },
  ],
  smoking_exposition: [
    {
      text: '< 1h exposición/semana o no exposición',
      val: 0,
    },
    {
      text: '> 1h exposición/semana',
      val: 2,
    },
  ],
  diabete: [
    {
      text: 'Sí',
      val: 6,
    },
    {
      text: 'No',
      val: 0,
    },
  ],
  hipertension: [
    {
      text: 'Sí',
      val: 5,
    },
    {
      text: 'No o desconozco',
      val: 0,
    },
  ],
  parents_ha_history: [
    {
      text: 'Sí',
      val: 4,
    },
    {
      text: 'No o desconozco',
      val: 0,
    },
  ],
  waist_index: [
    {
      text: 'Q1: < 0.873',
      val: 0,
    },
    {
      text: 'Q2: 0.873 - 0.963',
      val: 2,
    },
    {
      text: 'Q4: > 0.964',
      val: 4,
    },
  ],
  stress_frecuency: [
    {
      text: 'Nunca o algunos períodos',
      val: 0,
    },
    {
      text: 'Muchos períodos de estrés permanente',
      val: 3,
    },
  ],
  free_time_activity: [
    {
      text: 'Soy sedentario o realizo actividad física mínima',
      val: 2,
    },
    {
      text: 'Realizo actividad física moderada o intensa en mi tiempo libre',
      val: 0,
    },
  ],
  true_false: [
    {
      text: 'Sí',
      val: 1
    },
    {
      text: 'No',
      val: 0
    },
  ],
  vars: {
    region: 0.7,
    age: 1,
    gender: 0,
    smoking: 0,
    smoking_amount: 0,
    smoking_exposition: 0,
    diabetes: 0,
    hipertension: 0,
    parents_ha_history: 0,
    waist_index: 0,
    stress_frecuency: 0,
    free_time_activity: 0,
    salt_snack_food_daily: 0,
    fast_food_weekly: 0,
    eat_fruits: 0,
    eat_vegetables: 0,
    eat_meat: 0,
  },
}