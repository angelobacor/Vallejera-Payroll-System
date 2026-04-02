<!-- Modal -->
<div class="modal fade" id="overtimeModal" tabindex="-1" aria-labelledby="overtimeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="overtimeModalLabel">Overtime Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form id="overtimeForm" action="{{route('save_overtime')}}" method="POST">
            @csrf  
        <div class="mb-3">
            <label for="overtimeDate" class="form-label">Date</label>
            <input type="date" class="form-control" id="overtimeDate" name="date" required>
          </div>

          <div class="mb-3">
            <label for="startTime" class="form-label">Start Time</label>
            <input type="text" id="startTime" class="form-control" name="start_time" required>

          </div>

          <div class="mb-3">
            <label for="endTime" class="form-label">End Time</label>
            <input type="text" id="endTime" class="form-control" name="end_time" required>
          </div>

          <div class="mb-3">
            <label for="reason" class="form-label">Reason</label>
            <input type="text" class="form-control" id="reason" name="reason" required>
          </div>
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="overtimeForm">Save</button>
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
    minTime: "17:00",          // 5:00 PM
    maxTime: "23:59",          // 11:59 PM
    defaultDate: "17:00",      // Preselect 5:00 PM
    time_24hr: false           // Use 12-hour format with AM/PM
  });

  flatpickr("#endTime", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "h:i K",       // 12-hour format with AM/PM (e.g., 5:00 PM)
    minTime: "18:00",          // 5:00 PM
    maxTime: "23:59",          // 11:59 PM
    defaultDate: "18:00",      // Preselect 5:00 PM
    time_24hr: false           // Use 12-hour format with AM/PM
  });

  // const dateInput = document.getElementById('overtimeDate');
  // const today = new Date();

  // const yyyy = today.getFullYear();
  // const mm = String(today.getMonth() + 1).padStart(2, '0'); // Month (01-12)

  // const day = today.getDate();
  // const minDay = day <= 15 ? '01' : '16'; // Start from 1st or 16th

  // const minDate = `${yyyy}-${mm}-${minDay}`;

  // // Set only min, no max
  // dateInput.min = minDate;

    const today = new Date().toISOString().split('T')[0];
  document.getElementById('overtimeDate').setAttribute('min', today);
</script>