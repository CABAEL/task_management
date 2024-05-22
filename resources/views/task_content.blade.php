            
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-list-alt fa-5x"></i>
                                <h3 id="task_count">0 </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                                To do

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 Tasks
                                 
                            </div>
                            <div class="panel-body">
                                <center>
                                <a href="/addTask"><button class="btn btn-sm btn-primary"> + Add Task</button></a>
                                </center> 
                                

                                <div class="table-responsive">
                                    Status:
                                    <select id="status-filter">
                                        <option value="">All</option>
                                        @foreach ($task_status as $status)
                                            <option value="{{$status['id']}}">{{$status['status']}}</option>
                                        @endforeach
                                    </select>
                                    <br/>
                                    <br/>
                                    <table id="tasks-table" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Content</th>
                                                <th>Status</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>---</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Table body content will be populated dynamically by DataTables -->
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>