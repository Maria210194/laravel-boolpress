<template>
  <div class="container">
      <div class="row">
          <div class="col-12">
            <div class="mt-3">
                <h3 class="text-success">Contact us</h3>
            </div>
            <div v-if="success" class="alert alert-success mt-2" role="alert">
                Messaggio inviato correttamente!
            </div>
<!--form di compilazione, con prevent gli dico di non avere il comportamento di
default, ma di eseguire il mio metodo sendForm()-->
            <form method="post" @submit.prevent="sendForm()" class="mt-2">
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input v-model="email" type="email" name="email" class="form-control" :disabled="success"/>
<!--div per mostrare l'errore della mail: -->
                <div v-if="errors && errors.email">
                    <ul>
                        <li v-for="(errorText, index) in errors.email" :key="'error_email_' + index" class="text-danger list-group-item">
                            {{errorText}}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input v-model="name" type="text" name="name" class="form-control" :disabled="success"/>
                <div v-if="errors && errors.name">
                    <ul>
                        <li v-for="(errorText, index) in errors.name" :key="'error_name_' + index" class="text-danger">
                            {{errorText}}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="form-label">Message</label>
                <textarea v-model="message" name="message" class="form-control" placeholder="Type your message.." :disabled="success"></textarea>
                <div v-if="errors && errors.message">
                    <ul>
                        <li v-for="(errorText, index) in errors.message" :key="'error_message_'+ index" class="text-danger">
                            {{errorText}}
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <button type="submit" :disabled="sending" class="btn btn-success">Send</button>
            </div>
            </form>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'ContactsComponent',
    data(){
        return {
            email: '',
            name: '',
            message: '',
            sending: false,
            success: false,
            errors: undefined
        }
    },
    methods: {
        sendForm(){
            this.sending = true;
            this.success = false;

            window.axios.post('/api/contacts', {
                name: this.name,
                email: this.email,
                message: this.message
            }).then(({data, status})=>{
                if(status === 200){
                    this.success = data.success;
                    if(!data.success){
                        this.sending = false;
                        this.errors= data.errors;
                        console.log(this.errors);
                    }else{
                        this.name = '';
                        this.email = '';
                        this.message = '';
                    }
                }

            }).catch(error=>{
                console.log(error);
            })
        }
    }

}
</script>

<style>

</style>
