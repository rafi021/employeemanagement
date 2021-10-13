<template>
<div class="row justify-content-center">
        <div class="col-md-8 mx-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Employee Form</h1>
            </div>
            <div class="card">
                <div class="card-header">
                    <router-link :to="{name: 'employee.index'}" class="float-right btn btn-secondary">Back</router-link>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group row">
                        <label for="first_name" class="col-md-4 col-form-label text-md-right">First name</label>
                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control"
                            name="first_name" v-model="employeeForm.first_name" required autocomplete="first_name" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-md-4 col-form-label text-md-right">Last name</label>
                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control"
                                name="last_name" v-model="employeeForm.last_name" required autocomplete="last_name" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="middle_name" class="col-md-4 col-form-label text-md-right">Middle Name</label>
                        <div class="col-md-6">
                            <input id="middle_name" type="text" class="form-control"
                            name="middle_name" v-model="employeeForm.middle_name" autofocus>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Add New
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Form from 'vform'
export default {
    data(){
        return{
            employeeForm: new Form({
                last_name: '',
                first_name: '',
                middle_name: '',
            }),
        }
    }
}
</script>

<style>

</style>
