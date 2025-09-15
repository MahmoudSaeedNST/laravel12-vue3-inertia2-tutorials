<!-- sample 2 -->
<div class="text-red-500 font-bold" v-if="form.errors.name">{{ form.errors.name }}</div>
<!-- sample 3 -->
{{ processing ? 'Creating...' : 'Register' }}
 <div v-if="errors">
            {{ errors }}
        </div>
        <div v-if="wasSuccessful">User Register successfully!</div>