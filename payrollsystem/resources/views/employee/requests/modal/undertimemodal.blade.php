<!-- Modal -->
<div class="modal fade" id="undertimeModal" tabindex="-1" aria-labelledby="overtimeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="overtimeModalLabel">Undertime Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form id="undertimeForm" action="{{route('save_undertime')}}" method="POST">
            @csrf  
        <div class="mb-3">
            <label for="overtimeDate" class="form-label">Date</label>
            <input type="date" class="form-control" id="overtimeDate" name="date" required>
          </div>

          <div class="mb-3">
            <label for="startTime" class="form-label">Start Time</label>
            <input type="time" class="form-control" id="startTime" name="start_time" required>
          </div>

          <div class="mb-3">
            <label for="endTime" class="form-label">End Time</label>
            <input type="time" class="form-control" id="endTime" name="end_time" required>
          </div>

          <div class="mb-3">
            <label for="reason" class="form-label">Reason</label>
            <input type="text" class="form-control" id="reason" name="reason" required>
          </div>
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="undertimeForm">Save</button>
      </div>

    </div>
  </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
  flatpickr("#startTime", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "h:i K",       // 12-hour format with AM/PM (e.g., 5:00 PM)
    minTime: "14:00",          // 5:00 PM
    maxTime: "17:00",          // 11:59 PM
    defaultDate: "14:00",      // Preselect 5:00 PM
    time_24hr: false           // Use 12-hour format with AM/PM
  });

  flatpickr("#endTime", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "h:i K",       // 12-hour format with AM/PM (e.g., 5:00 PM)
    minTime: "14:00",          // 5:00 PM
    maxTime: "17:00",          // 11:59 PM
    defaultDate: "17:00",      // Preselect 5:00 PM
    time_24hr: false           // Use 12-hour format with AM/PM
  });

</script>