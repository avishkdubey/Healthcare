<div class="modal-content box">
                <div class="modal-header">
                    <h5 class="modal-title">Book an Appointment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="doctor-select">Select Doctor</label>
                            <select class="form-control" id="doctor-select">
                                <option>Select Doctor</option>
                                
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="appointment-date">Appointment Date</label>
                            <input type="date" class="form-control" id="appointment-date">
                        </div>
                        <div class="form-group">
                            <label for="appointment-time">Appointment Time</label>
                            <input type="time" class="form-control" id="appointment-time">
                        </div>
                        <div class="form-group">
                            <label for="appointment-comments">Comments</label>
                            <textarea class="form-control" id="appointment-comments" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Book Appointment</button>
                </div>
            </div>