<template>
<div class="row justify-content-center">
    <div class="col-md-9 mx-auto">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form>
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" id="search" class="form-control mb-2" placeholder="Search">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <router-link :to="{name: 'employee.create'}" class="float-right btn btn-primary">Create</router-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Department</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row"></th>
                        <td scope="row"></td>
                        <td scope="row"></td>
                        <td scope="row"></td>
                        <td scope="row"></td>
                        <td scope="row">
                            <router-link :to="{name: 'employee.edit', params: { id: 1}}" class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                            <button type="button" class="btn btn-danger"> <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                      </tr>

                </tbody>
              </table>
            </div>

    </div>
</div>
</template>

<script>
export default {

}
</script>

<style>

</style>
