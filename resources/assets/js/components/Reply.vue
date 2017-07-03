<script>
    export default {
        props: ['attributes'],

        data() {
            return {
                editing: false,
                body: this.attributes.body
            };
        },

        created() {

        },

        methods: {
            update() {
                axios.
                    patch(`/replies/${this.attributes.id}`, {
                        body: this.body
                    });

                this.editing = false;
                flash('Updated!');
            }
        }
    }
</script>