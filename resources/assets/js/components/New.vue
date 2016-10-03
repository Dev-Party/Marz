<template>
<form class="form-horizontal" role="form" method="POST">

    <div class="form-group">
        <label for="name" class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="frequency" class="col-md-4 control-label">Frequency</label>

        <div class="col-md-6">
            <input id="frequency" type="text" class="form-control" name="frequency" value="" required>
        </div>
    </div>

    <div class="form-group">
        <label for="modulation_id" class="col-md-4 control-label">modulation_id</label>

        <div class="col-md-6">
            <input id="modulation_id" type="text" class="form-control" name="modulation_id" value="" required>

        </div>
    </div>

    <div class="form-group">
        <label for="streaming" class="col-md-4 control-label">streaming</label>

        <div class="col-md-6">
            <input id="streaming" type="text" class="form-control" name="streaming" value="" required>
        </div>
    </div>

    <div class="form-group">
        <label for="state_id" class="col-md-4 control-label">state_id</label>

        <div class="col-md-6">
            <input id="state_id" type="text" class="form-control" name="state_id" value="" required>

        </div>
    </div>

    <div class="form-group">
        <label for="city_id" class="col-md-4 control-label">city_id</label>

        <div class="col-md-6">
            <input id="city_id" type="text" class="form-control" name="city_id" value="" required>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </div>
    </div>
</form>
</template>

<script>
export default {
}
</script>