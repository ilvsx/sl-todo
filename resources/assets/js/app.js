import UserList from './vue/components/UserList.vue'
import Todos from './vue/components/Todos.vue'

export default {
    data: {
        msg: "hello",
        isLocaleReady: false,
    },
    components: {
        'sl-user-list': UserList,
        'sl-todos': Todos,
    },
    methods: {
        initLocale(){
            console.log('Init Locale.');

            var that = this;
            var lang = this.locale;

            Vue.config.lang = lang;
            Vue.locale(lang, window.Someline.locales);

        },
    },
    watch: {},
    events: {},
    created(){
        console.log('Bootstrap.');
        this.initLocale();
    },
    ready(){
        console.log('Ready.');
    }
}