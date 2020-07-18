<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\RolePermission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.setting.role_permission.index', compact('roles'));
    }

    public function permitSection($role_id, $roleName)
    {
        $roleName = $roleName;
        $permits = RolePermission::where('role_id', $role_id)->firstOrFail();
        return view('admin.setting.role_permission.permission_section', compact('permits', 'roleName'));
    }

    public function permission(Request $request, $roleId)
    {
        $addPermission = RolePermission::where('role_id', $roleId)->firstOrFail();
        $addPermission->student_module = $this->studentPermission($request);
        $addPermission->academic_module = $this->academicPermission($request);
        $addPermission->exam_module = $this->examMasterPermission($request);
        $addPermission->transport_module = $this->transportPermission($request);
        $addPermission->event_module = $this->eventPermission($request);
        $addPermission->employee_module = $this->employeePermission($request);
        $addPermission->human_resource_module = $this->humanResourcePermission($request);
        $addPermission->income_module = $this->incomePermission($request);
        $addPermission->expanse_module = $this->expansePermission($request);
        $addPermission->attachment_book_module = $this->attachmentBookPermission($request);
        $addPermission->office_accounts_module = $this->officeAccountsPermission($request);
        $addPermission->hostel_module = $this->hostelPermission($request);
        $addPermission->library_module = $this->libraryPermission($request);
        $addPermission->attendance_module = $this->attendancePermission($request);
        $addPermission->fees_collection_module = $this->feesCollectionPermission($request);
        $addPermission->save();
        
        return response()->json('Successfully permission has been saved.');  
    }

    private function studentPermission($request)
    {
        $data = [
            'view' => isset($request->student_view) ? $request->student_view : 0,
            'add' => isset($request->student_add) ? $request->student_add : 0,
            'edit' => isset($request->student_edit) ? $request->student_edit : 0,
            'delete' => isset($request->student_delete) ? $request->student_delete : 0,
        ];

        return json_encode($data);
    }

    private function academicPermission($request)
    {
        $academicPermission = [
            'class' => [
                'view' => isset($request->class_view) ? $request->class_view : 0,
                'add' => isset($request->class_add) ? $request->class_add : 0,
                'edit' => isset($request->class_edit) ? $request->class_edit : 0,
                'delete' => isset($request->class_delete) ? $request->class_delete : 0,
            ],
            'session' => [
                'view' => isset($request->session_view) ? $request->session_view : 0,
                'add' => isset($request->session_add) ? $request->session_add : 0,
                'edit' => isset($request->session_edit) ? $request->session_edit : 0,
                'delete' => isset($request->session_delete) ? $request->session_delete : 0,
            ],
            'section' => [
                'view' => isset($request->section_view) ? $request->section_view : 0,
                'add' => isset($request->section_add) ? $request->section_add : 0,
                'edit' => isset($request->section_edit) ? $request->section_edit : 0,
                'delete' => isset($request->section_delete) ? $request->section_delete : 0,
            ],
            'subject' => [
                'view' => isset($request->subject_view) ? $request->subject_view : 0,
                'add' => isset($request->subject_add) ? $request->subject_add : 0,
                'edit' => isset($request->subject_edit) ? $request->subject_edit : 0,
                'delete' => isset($request->subject_delete) ? $request->subject_delete : 0,
            ],
            'assign_class_teacher' => [
                'view' => isset($request->assign_class_teacher_view) ? $request->assign_class_teacher_view : 0,
                'add' => isset($request->assign_class_teacher_add) ? $request->assign_class_teacher_add : 0,
                'edit' => isset($request->assign_class_teacher_edit) ? $request->assign_class_teacher_edit : 0,
                'delete' => isset($request->assign_class_teacher_delete) ? $request->assign_class_teacher_delete : 0,
            ],
            'assign_subject' => [
                'view' => isset($request->assign_subject_view) ? $request->assign_subject_view : 0,
                'add' => isset($request->assign_subject_add) ? $request->assign_subject_add : 0,
                'edit' => isset($request->assign_subject_edit) ? $request->assign_subject_edit : 0,
                'delete' => isset($request->assign_subject_delete) ? $request->assign_subject_delete : 0,
            ],
            'Assign_teacher_to_subject' => [
                'view' => isset($request->assign_teacher_subject_view) ? $request->assign_teacher_subject_view : 0,
                'add' => isset($request->assign_teacher_subject_add) ? $request->assign_teacher_subject_add : 0,
                'edit' => isset($request->assign_teacher_subject_edit) ? $request->assign_teacher_subject_edit : 0,
                'delete' => isset($request->assign_teacher_subject_delete) ? $request->assign_teacher_subject_delete : 0,
            ],
            'class_timetable' => [
                'view' => isset($request->class_timetable_view) ? $request->class_timetable_view : 0,
                'add' => isset($request->class_timetable_add) ? $request->class_timetable_add : 0,
                'edit' => isset($request->class_timetable_edit) ? $request->class_timetable_edit : 0,
                'delete' => isset($request->class_timetable_delete) ? $request->class_timetable_delete : 0,
            ],
            'teacher_timetable' => [
                'view' => isset($request->teacher_timetable_view) ? $request->teacher_timetable_view : 0,
            ],
        ];

        return json_encode($academicPermission);
    }

    private function examMasterPermission($request)
    {
        $examMasterPermission = [
            'exam' => [
                'term' => [
                    'view' => isset($request->exam_term_view) ? $request->exam_term_view : 0,
                    'add' => isset($request->exam_term_add) ? $request->exam_term_add : 0,
                    'edit' => isset($request->exam_term_edit) ? $request->exam_term_edit : 0,
                    'delete' => isset($request->exam_term_delete) ? $request->exam_term_delete : 0,
                ],
                'hall' => [
                    'view' => isset($request->exam_hall_view) ? $request->exam_hall_view : 0,
                    'add' => isset($request->exam_hall_add) ? $request->exam_hall_add : 0,
                    'edit' => isset($request->exam_hall_edit) ? $request->exam_hall_edit : 0,
                    'delete' => isset($request->exam_hall_delete) ? $request->exam_hall_delete : 0,
                ],
                'distribution' => [
                    'view' => isset($request->exam_distribution_view) ? $request->exam_distribution_view : 0,
                    'add' => isset($request->exam_distribution_add) ? $request->exam_distribution_add : 0,
                    'edit' => isset($request->exam_distribution_edit) ? $request->exam_distribution_edit : 0,
                    'delete' => isset($request->exam_distribution_delete) ? $request->exam_distribution_delete : 0,
                ],
                'exam_setup' => [
                    'view' => isset($request->exam_setup_view) ? $request->exam_setup_view : 0,
                    'add' => isset($request->exam_setup_add) ? $request->exam_setup_add : 0,
                    'edit' => isset($request->exam_setup_edit) ? $request->exam_setup_edit : 0,
                    'delete' => isset($request->exam_setup_delete) ? $request->exam_setup_delete : 0,
                ],
            ],
            'exam_schedule' => [
                'create_schedule' => [
                    'view' => isset($request->exam_schedule_create_view) ? $request->exam_schedule_create_view : 0,
                    'add' => isset($request->exam_schedule_create_add) ? $request->exam_schedule_create_add : 0,
                ],
                'check_schedule' => [
                    'view' => isset($request->exam_schedule_check_view) ? $request->exam_schedule_check_view : 0,
                ],
            ],
            'mark' => [
                'mark_entire' => [
                    'view' => isset($request->exam_mark_entire_view) ? $request->exam_mark_entire_view : 0,
                    'add' => isset($request->exam_mark_entire_add) ? $request->exam_mark_entire_add : 0,
                ],
                'grade_range' => [
                    'view' => isset($request->exam_grande_view) ? $request->exam_grande_view : 0,
                    'add' => isset($request->exam_grande_add) ? $request->exam_grande_add : 0,
                    'edit' => isset($request->exam_grande_edit) ? $request->exam_grande_edit : 0,
                    'delete' => isset($request->exam_grande_delete) ? $request->exam_grande_delete : 0,
                ],
                'exam_report_card' => [
                    'view' => isset($request->exam_report_card_view) ? $request->exam_report_card_view : 0,
                ],
            ],
            'admit_card' => [
                'design_admit_card' => [
                    'view' => isset($request->exam_admit_card_view) ? $request->exam_admit_card_view : 0,
                    'add' => isset($request->exam_admit_card_add) ? $request->exam_admit_card_add : 0,
                    'edit' => isset($request->exam_admit_card_edit) ? $request->exam_admit_card_edit : 0,
                    'delete' => isset($request->exam_admit_card_delete) ? $request->exam_admit_card_delete : 0,
                ],
                'print_admit_card' => [
                    'view' => isset($request->print_admit_card_view) ? $request->print_admit_card_view : 0,
                ]
            ]                            
        ];

        return json_encode($examMasterPermission);
    }

    private function attendancePermission($request)
    {
        $attendancePermission = [
            
            'attendance' => [
                'view' => isset($request->attendance_view) ? $request->attendance_view : 0,
                'add' => isset($request->attendance_add) ? $request->attendance_add : 0,
                'edit' => isset($request->attendance_edit) ? $request->attendance_edit : 0,
            ],
            'period_attendance' => [
                'view' => isset($request->period_attendance_view) ? $request->period_attendance_view : 0,
                'add' => isset($request->period_attendance_add) ? $request->period_attendance_add : 0,
                'edit' => isset($request->period_attendance_edit) ? $request->period_attendance_edit : 0,
            ],
            'exam_attendance' => [
                'view' => isset($request->exam_attendance_view) ? $request->exam_attendance_view : 0,
                'add' => isset($request->exam_attendance_add) ? $request->exam_attendance_add : 0,
                'edit' => isset($request->exam_attendance_edit) ? $request->exam_attendance_edit : 0,
            ],
            
            
        ];
        return json_encode($attendancePermission);
    }
    
    private function transportPermission($request)
    {
        $transportPermission = [
            'route' => [
                'view' => isset($request->route_view) ? $request->route_view : 0,
                'add' => isset($request->route_add) ? $request->route_add : 0,
                'edit' => isset($request->route_edit) ? $request->route_edit : 0,
                'delete' => isset($request->route_delete) ? $request->route_delete : 0,
            ],
            'vehicle' => [
                'view' => isset($request->vehicle_view) ? $request->vehicle_view : 0,
                'add' => isset($request->vehicle_add) ? $request->vehicle_add : 0,
                'edit' => isset($request->vehicle_edit) ? $request->vehicle_edit : 0,
                'delete' => isset($request->vehicle_delete) ? $request->vehicle_delete : 0,
            ],
            'assign_vehicle' => [
                'view' => isset($request->assign_vehicle_view) ? $request->assign_vehicle_view : 0,
                'add' => isset($request->assign_vehicle_add) ? $request->assign_vehicle_add : 0,
                'edit' => isset($request->assign_vehicle_edit) ? $request->assign_vehicle_edit : 0,
                'delete' => isset($request->assign_vehicle_delete) ? $request->assign_vehicle_delete : 0,
            ],
            'assign_driver' => [
                'view' => isset($request->assign_driver_view) ? $request->assign_driver_view : 0,
                'add' => isset($request->assign_driver_add) ? $request->assign_driver_add : 0,
                'edit' => isset($request->assign_driver_edit) ? $request->assign_driver_edit : 0,
                'delete' => isset($request->assign_driver_delete) ? $request->assign_driver_delete : 0,
            ],
        ];
        return json_encode($transportPermission);
    }
    
    private function eventPermission($request)
    {
        $eventPermission = [
            'view' => isset($request->event_view) ? $request->event_view : 0,
            'add' => isset($request->event_add) ? $request->event_add : 0,
            'edit' => isset($request->event_edit) ? $request->event_edit : 0,
            'delete' => isset($request->event_delete) ? $request->event_delete : 0,
        ];

        return json_encode($eventPermission);
    }
    
    private function employeePermission($request)
    {
        $employeePermission = [
            'view' => isset($request->employee_view) ? $request->employee_view : 0,
            'add' => isset($request->employee_add) ? $request->employee_add : 0,
            'edit' => isset($request->employee_edit) ? $request->employee_edit : 0,
            'delete' => isset($request->employee_delete) ? $request->employee_delete : 0,
        ];

        return json_encode($employeePermission);
    }

    private function humanResourcePermission($request)
    {
        $humanResourcePermission = [
            'employee_attendance' => [
                'view' => isset($request->emp_attendance_view) ? $request->emp_attendance_view : 0,
                'add' => isset($request->emp_attendance_add) ? $request->emp_attendance_add : 0,
                'edit' => isset($request->emp_attendance_edit) ? $request->emp_attendance_edit : 0,
            ],
            'employee_salary' => [
                'view' => isset($request->emp_salary_view) ? $request->emp_salary_view : 0,
                'add' => isset($request->emp_salary_add) ? $request->emp_salary_add : 0,
            ],
            'leave_approval' => [
                'view' => isset($request->leave_approval_view) ? $request->leave_approval_view : 0,
                'edit' => isset($request->leave_approval_edit) ? $request->leave_approval_edit : 0,
            ],
            'leave_apply' => [
                'view' => isset($request->leave_apply_view) ? $request->leave_apply_view : 0,
                'add' => isset($request->leave_apply_add) ? $request->leave_apply_add : 0,
            ],
            'leave_type' => [
                'view' => isset($request->leave_type_view) ? $request->leave_type_view : 0,
                'add' => isset($request->leave_type_add) ? $request->leave_type_add : 0,
                'edit' => isset($request->leave_type_edit) ? $request->leave_type_edit : 0,
                'delete' => isset($request->leave_type_delete) ? $request->leave_type_delete : 0,
            ],
        ];
        return json_encode($humanResourcePermission);
    }
    
    private function incomePermission($request)
    {
        $incomePermission = [
            'income' => [
                'view' => isset($request->income_view) ? $request->income_view : 0,
                'add' => isset($request->income_add) ? $request->income_add : 0,
                'edit' => isset($request->income_edit) ? $request->income_edit : 0,
                'delete' => isset($request->income_delete) ? $request->income_delete : 0,
            ],
            'income_search' => [
                'view' => isset($request->income_search_view) ? $request->income_search_view : 0,
            ],
            'income_header' => [
                'view' => isset($request->income_header_view) ? $request->income_header_view : 0,
                'add' => isset($request->income_header_add) ? $request->income_header_add : 0,
                'edit' => isset($request->income_header_edit) ? $request->income_header_edit : 0,
                'delete' => isset($request->income_header_delete) ? $request->income_header_delete : 0,
            ],
            
        ];
        return json_encode($incomePermission);
    }

    private function expansePermission($request)
    {
        $expansePermission = [
            'expanse' => [
                'view' => isset($request->income_view) ? $request->expanse_view : 0,
                'add' => isset($request->expanse_add) ? $request->expanse_add : 0,
                'edit' => isset($request->expanse_edit) ? $request->expanse_edit : 0,
                'delete' => isset($request->expanse_delete) ? $request->expanse_delete : 0,
            ],
            'expanse_search' => [
                'view' => isset($request->expanse_search_view) ? $request->expanse_search_view : 0,
            ],
            'expanse_header' => [
                'view' => isset($request->expanse_header_view) ? $request->expanse_header_view : 0,
                'add' => isset($request->expanse_header_add) ? $request->expanse_header_add : 0,
                'edit' => isset($request->expanse_header_edit) ? $request->expanse_header_edit : 0,
                'delete' => isset($request->expanse_header_delete) ? $request->expanse_header_delete : 0,
            ],
        ];
        return json_encode($expansePermission);
    }

    private function attachmentBookPermission($request)
    {
        $attachmentBookPermission = [
            'attachment_type' => [
                'view' => isset($request->attachment_type_view) ? $request->attachment_type_view : 0,
                'add' => isset($request->attachment_type_add) ? $request->attachment_type_add : 0,
                'edit' => isset($request->attachment_type_edit) ? $request->attachment_type_edit : 0,
                'delete' => isset($request->attachment_type_delete) ? $request->attachment_type_delete : 0,  
            ],
            'upload_content' => [
                'view' => isset($request->upload_content_view) ? $request->upload_content_view : 0,
                'add' => isset($request->upload_content_add) ? $request->upload_content_add : 0,
                'edit' => isset($request->upload_content_edit) ? $request->upload_content_edit : 0,
                'delete' => isset($request->upload_content_delete) ? $request->upload_content_delete : 0,  
            ], 
        ];

        return json_encode($attachmentBookPermission); 
    }
    
    private function officeAccountsPermission($request)
    {
        $officeAccountsPermission = [
            'bank' => [
                'view' => isset($request->bank_view) ? $request->bank_view : 0,
                'add' => isset($request->bank_add) ? $request->bank_add : 0,
                'edit' => isset($request->bank_edit) ? $request->bank_edit : 0,
                'delete' => isset($request->bank_delete) ? $request->bank_delete : 0,  
            ],
            'account' => [
                'view' => isset($request->account_view) ? $request->account_view : 0,
                'add' => isset($request->account_add) ? $request->account_add : 0,
                'edit' => isset($request->account_edit) ? $request->account_edit : 0,
                'delete' => isset($request->account_delete) ? $request->account_delete : 0,  
            ],
            'deposit' => [
                'view' => isset($request->deposit_view) ? $request->deposit_view : 0,
                'add' => isset($request->deposit_add) ? $request->deposit_add : 0,
                'edit' => isset($request->deposit_edit) ? $request->deposit_edit : 0,
                'delete' => isset($request->deposit_delete) ? $request->deposit_delete : 0,  
            ],
            'withdraw' => [
                'view' => isset($request->withdraw_view) ? $request->withdraw_view : 0,
                'add' => isset($request->withdraw_add) ? $request->withdraw_add : 0,
                'edit' => isset($request->withdraw_edit) ? $request->withdraw_edit : 0,
                'delete' => isset($request->withdraw_delete) ? $request->withdraw_delete : 0,  
            ],
            'voucher_header' => [
                'view' => isset($request->voucher_header_view) ? $request->voucher_header_view : 0,
                'add' => isset($request->voucher_header_add) ? $request->voucher_header_add : 0,
                'edit' => isset($request->voucher_header_edit) ? $request->voucher_header_edit : 0,
                'delete' => isset($request->voucher_header_delete) ? $request->voucher_header_delete : 0,  
            ], 
        ];

        return json_encode($officeAccountsPermission); 
    }
    
    private function hostelPermission($request)
    {
        $hostelPermission = [
            'hostel_room' => [
                'view' => isset($request->hostel_room_view) ? $request->hostel_room_view : 0,
                'add' => isset($request->hostel_room_add) ? $request->hostel_room_add : 0,
                'edit' => isset($request->hostel_room_edit) ? $request->hostel_room_edit : 0,
                'delete' => isset($request->hostel_room_delete) ? $request->hostel_room_delete : 0,  
            ],
            'room_type' => [
                'view' => isset($request->room_type_view) ? $request->room_type_view : 0,
                'add' => isset($request->room_type_add) ? $request->room_type_add : 0,
                'edit' => isset($request->room_type_edit) ? $request->room_type_edit : 0,
                'delete' => isset($request->room_type_delete) ? $request->room_type_delete : 0,  
            ],
            'hostel' => [
                'view' => isset($request->hostel_view) ? $request->hostel_view : 0,
                'add' => isset($request->hostel_add) ? $request->hostel_add : 0,
                'edit' => isset($request->hostel_edit) ? $request->hostel_edit : 0,
                'delete' => isset($request->hostel_delete) ? $request->hostel_delete : 0,  
            ], 
        ];

        return json_encode($hostelPermission); 
    }

    private function libraryPermission($request)
    {
        $libraryPermission = [
            'book_list' => [
                'view' => isset($request->book_list_view) ? $request->book_list_view : 0,
                'add' => isset($request->book_list_add) ? $request->book_list_add : 0,
                'edit' => isset($request->book_list_edit) ? $request->book_list_edit : 0,
                'delete' => isset($request->book_list_delete) ? $request->book_list_delete : 0,  
            ],
            'library_member' => [
                'view' => isset($request->library_member_view) ? $request->library_member_view : 0,
                'add' => isset($request->library_member_add) ? $request->library_member_add : 0,
                'edit' => isset($request->library_member_edit) ? $request->library_member_edit : 0,
                'delete' => isset($request->library_member_delete) ? $request->library_member_delete : 0,  
            ],
            'library_staff' => [
                'view' => isset($request->library_staff_view) ? $request->library_staff_view : 0,
                'add' => isset($request->library_staff_add) ? $request->library_staff_add : 0,
                'edit' => isset($request->library_staff_edit) ? $request->library_staff_edit : 0,
                'delete' => isset($request->library_staff_delete) ? $request->library_staff_delete : 0,  
            ], 
        ];

        return json_encode($libraryPermission); 
    } 
    
    private function feesCollectionPermission($request)
    {
        $feesCollectionPermission = [                       
            'fees_remember' => [
                'view' => isset($request->fees_remember_view) ? $request->fees_remember_view : 0,
                'edit' => isset($request->fees_remember_edit) ? $request->fees_remember_edit : 0,
            ],
            'fees_type' => [
                'view' => isset($request->fees_type_view) ? $request->fees_type_view : 0,
                'add' => isset($request->fees_type_add) ? $request->fees_type_add : 0,
                'edit' => isset($request->fees_type_edit) ? $request->fees_type_edit : 0,
                'delete' => isset($request->fees_type_delete) ? $request->fees_type_delete : 0,  
            ],
            'fees_discount' => [
                'view' => isset($request->fees_discount_view) ? $request->fees_discount_view : 0,
                'add' => isset($request->fees_discount_add) ? $request->fees_discount_add : 0,
                'edit' => isset($request->fees_discount_edit) ? $request->fees_discount_edit : 0,
                'delete' => isset($request->fees_discount_delete) ? $request->fees_discount_delete : 0,  
            ],
            'fees_group' => [
                'view' => isset($request->fees_group_view) ? $request->fees_group_view : 0,
                'add' => isset($request->fees_group_add) ? $request->fees_group_add : 0,
                'edit' => isset($request->fees_group_edit) ? $request->fees_group_edit : 0,
                'delete' => isset($request->fees_group_delete) ? $request->fees_group_delete : 0,  
            ],
            'fees_master' => [
                'view' => isset($request->fees_master_view) ? $request->fees_master_view : 0,
                'add' => isset($request->fees_master_add) ? $request->fees_master_add : 0,
                'edit' => isset($request->fees_master_edit) ? $request->fees_master_edit : 0,
                'delete' => isset($request->fees_master_delete) ? $request->fees_master_delete : 0,  
            ],
            'fees_collection' => [
                'view' => isset($request->fees_collection_view) ? $request->fees_collection_view : 0,
                'add' => isset($request->fees_collection_add) ? $request->fees_collection_add : 0,
            ], 
        ];

        return json_encode($feesCollectionPermission); 
    }


}
