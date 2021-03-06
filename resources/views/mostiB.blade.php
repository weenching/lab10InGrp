<!-- Stored in resources/views/mostiA.blade.php -->

@extends('layouts.master')

@section('css')
    .form-group .required:after {
        content: " *";
        color: red;
    }

    ul#for_ul, ul#seo_ul {
        list-style-type: none;
    }
@endsection

@section('sidebar')
    <p><a class="btn btn-primary btn-lg" href="{{url('/info')}}">
        Learn More>>
    </a></p>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open([
                'class' => 'form-horizontal',
                'id' => 'form1'
                ]) !!}
                <div class="form-group">
                    {!! Form::label('staff-id', "Staff ID", [
                        'class' => 'col-sm-3 control-label required'
                        ]) !!}
                    <div class="col-sm-9">
                        {!! Form::text('staff-id', null, [
                            'class' => 'form-control',
                            'id' => 'staff-id',
                            'title' => 'staff id',
                            'placeholder' => 'staff id',
                            'required' => 'required'
                            ]) !!}
                    </div>
                </div>
                <br/>

                <div class="form-group">
                    {!! Form::label('author-names', "Author Names", [
                        'class' => 'col-sm-3 control-label required'
                        ]) !!}
                    <div class="col-sm-9">
                        {!! Form::text('authornames', null, [
                            'class' => 'form-control',
                            'id' => 'author-names',
                            'title' => 'author name',
                            'placeholder' => 'author names',
                            'required' => 'required'
                            ]) !!}
                    </div>
                </div>
                <br/>

                <div class="form-group">
                    {!! Form::label('forarea', "Fields of Research (FOR)", [
                        'class' => 'col-sm-3 control-label required'
                        ]) !!}
                    <div class="col-sm-9">
                        {!! Form::text('forarea', null, [
                            'class' => 'form-control',
                            'id' => 'forarea',
                            'title' => 'for',
                            'placeholder' => 'FOR',
                            'required' => 'required'
                            ]) !!}
                        <select id="forarea_sel" class="col-sm-9">
                            <option selected="selected" disabled="disabled">Select one</option>
                            <option>try</option>
                            <option>Try2</option>
                        </select><br/>
                        <ul id="for_ul"></ul>
                        <p id="for_text"></p>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('seo', "Socio-economic Objectives (SEO)", [
                        'class' => 'col-sm-3 control-label'
                        ]) !!}
                    <div class="col-sm-9">
                        {!! Form::text('seo', null, [
                            'class' => 'form-control',
                            'id' => 'seo',
                            'title' => 'SEO',
                            'placeholder' => 'SEO'
                            ]) !!}
                        <select id="seo_sel" class="col-sm-9">
                            <option id="test1" selected disabled>Select one</option>
                            <option>try</option>
                            <option>Try2</option>
                        </select><br/>
                        <ul id="seo_ul"></ul>
                        <p id="seo_text"></p>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('comments', "Comments", [
                        'class' => 'col-sm-3 control-label'
                        ]) !!}
                    <div class="col-sm-9">
                        {!! Form::text('comments', null, [
                            'class' => 'form-control',
                            'id' => 'comments',
                            'title' => 's id'
                            ]) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="message" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        {!! Form::button('Submit', [
                            'class' => 'btn btn-primary',
                            'id' => 'subBtn'
                            ]) !!}
                        {!! Form::button('Clear', [
                            'class' => 'btn btn-warning',
                            'id' => 'clrBtn'
                            ]) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('subBtn').onclick = function(){submitEvent();};
        document.getElementById('clrBtn').onclick = function(){clearEvent();};
        document.getElementById('forarea_sel').onchange = function(){forareaSel();};
        document.getElementById('seo_sel').onchange = function(){seoSel();};
        var fullForText = "", fullSeoText = "";
        var forTotal = 0, seoTotal = 0;

        function onload() {
            document.getElementById('forarea_sel').onclick = function(){forareaSel();};
            document.getElementById('seo_sel').onclick = function(){seoSel();};
        }
        function forareaSel() {
            var x = document.getElementById('forarea_sel');
            var text = x.options[x.selectedIndex].innerHTML;
            if (fullForText == "") {
                fullForText += text;
            } else {
                fullForText += ", " + text;
            }
            forTotal += 1;
            x.remove(x.selectedIndex);
            x.selectedIndex = 0;
            var list = document.getElementById("for_ul");
            var node = document.createElement("LI");
            var btn = document.createElement("BUTTON");
            var textnode = document.createTextNode(text);
            btn.setAttribute("type", "button");
            btn.onclick = function() {
                this.parentNode.removeChild(this);
                if (fullForText.indexOf(text+", ") >= 0) {
                    fullForText = fullForText.replace(text+", ", "");
                } else if (fullForText.indexOf(", "+text) >= 0) {
                    fullForText = fullForText.replace(", "+text, "");
                } else {
                    fullForText = fullForText.replace(text, "");
                }
                var option = document.createElement("option");
                option.text = text;
                x.add(option);
                document.getElementById("for_text").innerHTML=fullForText; //for tracing
            };
            btn.appendChild(textnode);
            node.appendChild(btn);
            list.appendChild(node);
            document.getElementById("for_text").innerHTML=fullForText; //for tracing
        }
        function seoSel() {
            var x = document.getElementById('seo_sel');
            var text = x.options[x.selectedIndex].innerHTML;
            if (fullSeoText == "") {
                fullSeoText += text;
            } else {
                fullSeoText += ", " + text;
            }
            forTotal += 1;
            x.remove(x.selectedIndex);
            x.selectedIndex = 0;
            var list = document.getElementById("seo_ul");
            var node = document.createElement("LI");
            var btn = document.createElement("BUTTON");
            var textnode = document.createTextNode(text);
            btn.setAttribute("type", "button");
            btn.onclick = function() {
                this.parentNode.removeChild(this);
                if (fullSeoText.indexOf(text+", ") >= 0) {
                    fullSeoText = fullSeoText.replace(text+", ", "");
                } else if (fullSeoText.indexOf(", "+text) >= 0) {
                    fullSeoText = fullSeoText.replace(", "+text, "");
                } else {
                    fullSeoText = fullSeoText.replace(text, "");
                }
                var option = document.createElement("option");
                option.text = text;
                x.add(option);
                document.getElementById("seo_text").innerHTML=fullSeoText; //for tracing
            };
            btn.appendChild(textnode);
            node.appendChild(btn);
            list.appendChild(node);
            document.getElementById("seo_text").innerHTML=fullSeoText; //for tracing
        }
        function submitEvent() {
            document.getElementById("forarea").value = fullForText;
            document.getElementById("seo").value = fullSeoText;
            document.getElementById('form1').submit();
        }
        function clearEvent() {
            document.getElementById("staff-id").value = "";
            document.getElementById("author-names").value = "";
            fullForText = "";
            fullSeoText = "";
            document.getElementById("comments").value = "";
        }
    </script>
@endsection