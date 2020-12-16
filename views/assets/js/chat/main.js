/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      tab: null,
      message: '',
      files: [
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
        {
          name: 'John Doe',
          user: 'John Doe',
          timedate: '2020-12-20 17:00'
        },
      ],
      chat: [
        {
          from: "John Doe",
          message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, ipsa molestiae optio illum animi quos fuga voluptatem, quod dolor, commodi earum repellat hic quasi provident unde expedita alias mollitia aperiam?',
          time: '10:05',
        },
        {
          from: "me",
          message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, ipsa molestiae optio illum animi quos fuga voluptatem, quod dolor, commodi earum repellat hic quasi provident unde expedita alias mollitia aperiam?',
          time: '10:09',
        },
        {
          from: "John Doe",
          message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, ipsa molestiae optio illum animi quos fuga voluptatem, quod dolor, commodi earum repellat hic quasi provident unde expedita alias mollitia aperiam?',
          time: '10:05',
        },
        {
          from: "me",
          message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, ipsa molestiae optio illum animi quos fuga voluptatem, quod dolor, commodi earum repellat hic quasi provident unde expedita alias mollitia aperiam?',
          time: '10:09',
        },
        {
          from: "John Doe",
          message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, ipsa molestiae optio illum animi quos fuga voluptatem, quod dolor, commodi earum repellat hic quasi provident unde expedita alias mollitia aperiam?',
          time: '10:05',
        },
        {
          from: "me",
          message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, ipsa molestiae optio illum animi quos fuga voluptatem, quod dolor, commodi earum repellat hic quasi provident unde expedita alias mollitia aperiam?',
          time: '10:09',
        },
        {
          from: "John Doe",
          message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, ipsa molestiae optio illum animi quos fuga voluptatem, quod dolor, commodi earum repellat hic quasi provident unde expedita alias mollitia aperiam?',
          time: '10:05',
        },
        {
          from: "me",
          message: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, ipsa molestiae optio illum animi quos fuga voluptatem, quod dolor, commodi earum repellat hic quasi provident unde expedita alias mollitia aperiam?',
          time: '10:09',
        },
      ],
      msg: null
    },

    computed: {
    },

    created () {
    },

    mounted () {
    },

    methods: {
      send: function(){
        this.chat.push(
        {
          from: "me",
          message: this.msg,
          time: date.getHours() + ':' + date.getMinutes(),
        })
        this.msg = null
      },  	
  }
});