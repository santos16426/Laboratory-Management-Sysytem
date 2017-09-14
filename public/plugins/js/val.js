 // //start ng validations    
 //          $('#EmpLicense').bootstrapValidator({
 //            feedbackIcons: {
 //              valid: 'glyphicon glyphicon-ok',
 //              invalid: 'glyphicon glyphicon-remove',
 //              validating: 'glyphicon glyphicon-refresh'
 //            },
 //            fields: {
 //              rank_id: {
 //                validators: {
 //                  regexp: {
 //                    regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,
 //                    message: 'Special characters are not allowed.'
 //                  },
 //                }
 //              }, 
 //              firstname: {
 //                validators: {
 //                  stringLength: {
 //                    min: 2,
 //                    max: 20,
 //                    message:'First name should be at least 2 characters and not exceed 20 characters.'
 //                  },
 //                  regexp: {
 //                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
 //                    message: 'This field should contain alphabetical letters only.'
 //                  },
 //                  notEmpty: {
 //                    message: 'This field is required.'
 //                  },
 //                }
 //              }, 
 //              middlename: {
 //                validators: {
 //                  stringLength: {
 //                    max: 20,
 //                    message:'Middle name should not exceed 20 characters.'
 //                  },
 //                  regexp: {
 //                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
 //                    message: 'This field should contain alphabetical letters only.'
 //                  },
 //                }
 //              },      
 //              lastname: {
 //                validators: {
 //                  stringLength: {
 //                    min: 2,
 //                    max: 20,
 //                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
 //                  },
 //                  regexp: {
 //                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
 //                    message: 'This field should contain alphabetical letters only.'
 //                  },
 //                  notEmpty: {
 //                    message: 'This field is required.'
 //                  }
 //                }
 //              }, 
 //              address: {
 //                validators: {
 //                  regexp: {
 //                    regexp: /^[a-zA-Z'-a-z,]+[0-9-a-zA-Z,]+([,\s][,0-9-a-zA-Z'-]+)*$/,
 //                    message: 'Invalid Input.'
 //                  },
 //                  notEmpty: {
 //                    message: 'This field is required.'
 //                  }
 //                }
 //              }, 
 //              contact: {
 //                validators: {
 //                  regexp: {
 //                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
 //                    message: 'Invalid input.'
 //                  },
 //                  notEmpty: {
 //                    message: 'This field is required.'
 //                  }
 //                }
 //              }, 
 //              emptype: {
 //                validators: {
 //                  regexp: {
 //                    regexp: /^[a-zA-Z]+([-'_\s][a-zA-Z]+)*$/,
 //                    message: 'Numbers and Special characters are not allowed.'
 //                  },
 //                  stringLength: {
 //                    max: 25,
 //                    message:'You cannot exceed 25 characters.'
 //                  },
 //                  notEmpty: {
 //                    message: 'This field is required.'
 //                  }
 //                }
 //              },  
 //              username: {
 //                validators: {
 //                  stringLength: {
 //                    min: 6,
 //                    max: 30,
 //                    message:'Please enter at least 2 characters.'
 //                  },
 //                  notEmpty: {
 //                    message: 'This field is required.'
 //                  }
 //                }
 //              },     
 //              password: {
 //                validators: {
 //                  stringLength: {
 //                    min: 6,
 //                    max: 30,
 //                    message:'Password must be atleast 6 charaters.'
 //                  },
 //                  notEmpty: {
 //                    message: 'This field is required.'
 //                  },
 //                }
 //              },      
 //              confirmpass: {
 //                validators: {
 //                  stringLength: {
 //                    min: 6,
 //                    max: 30,
 //                    message:'Password must be atleast 6 charaters.'
 //                  },
 //                  notEmpty: {
 //                    message: 'This field is required.'
 //                  }
 //                }
 //              }, 
 //              license: {
 //                validators: {
 //                  regexp: {
 //                    regexp: /^[A-Z]{1,3}-[A-Z]{1,2}-[0-9]{1,4}$/,
 //                    message: 'Invalid License Number Format.'
 //                  },
 //                  notEmpty: {
 //                    message: 'This field is required.'
 //                  }
 //                }
 //              },                                             
 //            }
 //          });
 //          //end ng validations


// EmployeeType
$('#EmployeeTypeadd').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

           emptype: {
                validators: {
                    regexp: {
                            regexp: /^[a-zA-Z.]+([-'-_\s][().a-zA-Z0-9]+)*$/,
                            message: 'Special characters are not allowed.'
                    },
                    stringLength: {
                        max: 25,
                        message:'You cannot exceed 25 characters.'
                    },
                    remote: {
                        type: 'GET',
                        url: '/checkEmpType',
                        data:{ emptype:$('#emptype').val()},
                        message: 'Shing',
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },                                         
            }
        });


// service group ADD
    $('#servgrpadd').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {        
            servicegroup: {
                validators: {
                  remote: {
                        type: 'GET',
                        url: '/checkServgrp',
                        data:{ servicegroup:$('#servicegroup').val()},
                        message: 'Shing',
                    },
                    regexp: {
                            regexp: /^[a-zA-Z0-9.]+([-'-_\s][().a-zA-Z0-9]+)*$/,
                            message: 'Special characters are not allowed.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },                     
            }
        })

        ;

// service group EDIT
    $('#servgrpedit').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {        
            upservicegroup: {
                validators: {
                  regexp: {
                            regexp: /^[a-zA-Z0-9.]+([-'-_\s][().a-zA-Z0-9]+)*$/,
                            message: 'Special characters are not allowed.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },                     
            }
        })

        ;

// Service type ADD
    $('#servtypeadd').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {        
            servTypeName: {
                validators: {
                  remote: {
                        type: 'GET',
                        url: '/checkServtype',
                        data:{ servTypeName:$('#servTypeName').val()},
                        message: 'Shing',
                    },
                    regexp: {
                            regexp: /^[a-zA-Z0-9.]+([-'-_\s][().a-zA-Z0-9]+)*$/,
                            message: 'Special characters are not allowed.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },
            servGroup_id: {
                validators: {
                    notEmpty: {
                        message: 'Please select'
                    }
                }
            },                       
            }
        })

        ;

// Service type EDIT
    $('#servtypeedit').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {        
            upservTypeName: {
                validators: {
                  regexp: {
                            regexp: /^[a-zA-Z0-9.]+([-'-_\s][().a-zA-Z0-9]+)*$/,
                            message: 'Special characters are not allowed.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },                     
            }
        })

        ;

// service ADD
   $('#servadd')   
       
   .bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {    
            srvcname: {
                validators: {
                  remote: {
                        type: 'GET',
                        url: '/checkService',
                        data:{ srvcname:$('#srvcname').val()},
                        message: 'Shing',
                    },
                        regexp: {
                            regexp: /^[a-zA-Z0-9.]+([-'-_\s][().a-zA-Z0-9]+)*$/,
                            message: 'Special characters are not allowed.'
                    },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message:'Service name should be at least 2 characters and not exceed 20 characters.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },
            srvcgrp_id: {
                validators: {
                     regexp: {
                            regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,//wala lang to para lng magka check
                            message: 'Special characters are not allowed.'
                    },
                }
            }, 
            srvctyp_id: {
                validators: {
                     regexp: {
                            regexp: /^[a-zA-Z0-9]+([-'_\s][a-zA-Z0-9]+)*$/,//wala lang to para lng magka check
                            message: 'Special characters are not allowed.'
                    },
                }
            },     
            srvc_price: {
                validators: {
                        regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    stringLength: {
                        max: 9,
                        message:'Price limit reached'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },   
            }
        })

        ;
 
// service EDIT
   $('#servedit')   
       
   .bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {    
            srvcname: {
                validators: {
                        regexp: {
                            regexp: /^[a-zA-Z0-9.]+([-.'-_\s][().a-zA-Z0-9]+)*$/,
                            message: 'Special characters are not allowed.'
                    },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message:'Service name should be at least 2 characters and not exceed 20 characters.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            }, 
            srvcgrp_id: {
                validators: {
                     regexp: {
                            regexp: /^[a-zA-Z0-9]+([-'_\s][a-zA-Z0-9]+)*$/,//wala lang to para lng magka check
                            message: 'Special characters are not allowed.'
                    },
                }
            }, 
            srvctyp_id: {
                validators: {
                    regexp: {
                            regexp: /^[a-zA-Z0-9]+([-'_\s][a-zA-Z0-9]+)*$/,//wala lang to para lng magka check
                            message: 'Special characters are not allowed.'
                    }
                }
            },    
            srvc_price: {
                validators: {
                        regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    stringLength: {
                        max: 9,
                        message:'Price limit reached'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },   
            }
        })

        ;

// package ADD 
   $('#packageadd')   
       
   .bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {    
            packagename: {
                validators: {
                   remote: {
                        type: 'GET',
                        url: '/checkPackage',
                        data:{ packagename:$('#packagename').val()},
                        message: 'Shing',
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+([-'_\s][a-zA-Z0-9]+)*$/,
                        message: 'Special characters are not allowed.'
                    },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message:'Package name should be at least 2 characters and not exceed 20 characters.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    },
                }
            },   
             services: {
                validators: {
                       message: 'This field is required.' 
                }
            },   
            packageprice: {
                validators: {
                        regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    stringLength: {
                        max: 9,
                        message:'Price limit reached'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },   
            }
        })

        ;

// package EDIT
$('#packageedit')   
       
   .bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {    
            packagename: {
                validators: {
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+([-'_\s][a-zA-Z0-9]+)*$/,
                            message: 'Special characters are not allowed.'
                    },
                    stringLength: {
                        min: 2,
                        max: 20,
                        message:'Package name should be at least 2 characters and not exceed 20 characters.'
                    },
                    remote: {
                        type: 'GET',
                        url: '/checkUpPack',
                        data: {
                            packid: $('#packid').val(),
                            packagename: $('#packagename').val()
                        },
                        message: 'Shing',
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },   
             services: {
                validators: {
                       message: 'This field is required.' 
                }
            },   
            packageprice: {
                validators: {
                        regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    stringLength: {
                        max: 9,
                        message:'Price limit reached'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },   
            }
        })

        ;

// corporate ADD
     $('#corpadd').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            contactperson: {
                validators: {
                        stringLength: {
                        min: 2,
                        max:20,
                        message:'Contact person should at least be 2 characters and not exceed 20 characters'
                    },
                        regexp: {
                            regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                            message: 'This field should contain letters only.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    },
                }
            }, 
           companyname: {
                validators: {
                    remote: {
                        type: 'GET',
                        url: '/checkCorpName',
                        data:{ companyname:$('#companyname').val()},
                        message: 'Shing',
                    },
                    regexp: {
                            regexp: /^[a-zA-Z0-9]+([-'_\s][a-zA-Z0-9]+)*$/,
                            message: 'Special characters are not allowed.'
                    },
                    stringLength: {
                        max: 20,
                        message:'Company name should not exceed 20 characters.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },   
            contactnumber: {
                validators: {
                        remote: {
                        type: 'GET',
                        url: '/checkContacts',
                        data:{ contactnumber:$('#contactnumber').val()},
                        message: 'Shing',
                    },
                        regexp: {
                            regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                            message: 'Invalid Format.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },
            email: {
                validators: {
                        remote: {
                        type: 'GET',
                        url: '/checkEmail',
                        data:{ email:$('#email').val()},
                        message: 'Shing',
                    },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_.-]+@(yahoo|ymail|rocketmail|gmail)\.(uk|co|com|com.ph|in|co\.uk|net)$/,
                            message: 'Enter a valid email.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },  
            packprice: {
                validators: {
                        regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    stringLength: {
                        max: 9,
                        message:'Price limit reached'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },                                        
            }
        })

        ;

// corporate EDIT
     $('#corpedit').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            contactperson: {
                validators: {
                        stringLength: {
                        min: 2,
                        max:20,
                        message:'Contact person should at least be 2 characters and not exceed 20 characters'
                    },
                        regexp: {
                            regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                            message: 'This field should contain letters only.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    },
                }
            }, 
           companyname: {
                validators: {
                    regexp: {
                            regexp: /^[a-zA-Z0-9]+([-'_\s][a-zA-Z0-9]+)*$/,
                            message: 'Special characters are not allowed.'
                    },
                    stringLength: {
                        max: 20,
                        message:'Company name should not exceed 20 characters.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },   
            contactnumber: {
                validators: {
                        regexp: {
                            regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                            message: 'Invalid Format.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },
            email: {
                validators: {
                        regexp: {
                            regexp: /^[a-zA-Z0-9_.-]+@(yahoo|ymail|rocketmail|gmail)\.(uk|co|com|com.ph|in|co\.uk|net)$/,
                            message: 'Enter a valid email.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },  
            uppackprice: {
                validators: {
                        regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    stringLength: {
                        max: 9,
                        message:'Price limit reached'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },                                        
            }
        })

        ;

// rebate percentage
    $('#rebate').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {    
            rebatepercent: {
                validators: {
                        regexp: {
                            regexp: /^([1-9]|[1-9]\d)(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    stringLength: {
                        max: 9,
                        message:'Rebate limit reached'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            },                  
            }
        })

        ;
//rebate add

// patient add
$('#patientinfo')   
       
   .bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {    

            patient_fname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'First name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  },
                }
              }, 
              patient_mname: {
                validators: {
                  stringLength: {
                    max: 20,
                    message:'Middle name should not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                }
              },      
              patient_lname: {
                validators: {
                  stringLength: {
                    min: 2,
                    max: 20,
                    message:'Last name should be at least 2 characters and not exceed 20 characters.'
                  },
                  regexp: {
                    regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'This field should contain alphabetical letters only.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              patient_address: {
                validators: {
                  regexp: {
                    regexp: /^[a-zA-Z0-9#.]+([-.'-_\s][().,a-zA-Z0-9]+)*$/,
                    message: 'Invalid Input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              }, 
              patient_contact: {
                validators: {
                  regexp: {
                    regexp: /^(1[ \-\+]{0,3}|\+1[ -\+]{0,3}|\+1|\+)?((\(\+?1-[2-9][0-9]{1,2}\))|(\(\+?[2-8][0-9][0-9]\))|(\(\+?[1-9][0-9]\))|(\(\+?[17]\))|(\([2-9][2-9]\))|([ \-\.]{0,3}[0-9]{2,4}))?([ \-\.][0-9])?([ \-\.]{0,3}[0-9]{2,4}){2,3}$/,
                    message: 'Invalid input.'
                  },
                  notEmpty: {
                    message: 'This field is required.'
                  }
                }
              },
              patient_email: {
                validators: {
                        regexp: {
                            regexp: /^[a-zA-Z0-9_.-]+@(yahoo|ymail|rocketmail|gmail)\.(uk|co|com|com.ph|in|co\.uk|net)$/,
                            message: 'Enter a valid email.'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    }
                }
            }, 
            // birthday: {
            //     validators: {
                 
            //       notEmpty: {
            //         message: 'This field is required.'
            //       }
            //     }
            //   }, 
            // gender: {
            //     validators: {
            //          regexp: {
            //                 regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,//wala lang to para lng magka check
            //                 message: 'Special characters are not allowed.'
            //         },
            //     }
            // }, 
            //  civil_status: {
            //     validators: {
            //          regexp: {
            //                 regexp: /^[a-zA-Z0-9]+([-.'_\s][a-zA-Z0-9]+)*$/,//wala lang to para lng magka check
            //                 message: 'Special characters are not allowed.'
            //         },
            //     }
            // },    
            }
        })

        ;