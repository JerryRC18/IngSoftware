#include "update.h"
#include "ui_update.h"

update::update(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::update)
{
    ui->setupUi(this);

    db = QSqlDatabase::addDatabase("QMYSQL");

    db.setHostName("bd5s63srxd7fvmbw3cai-mysql.services.clever-cloud.com");
    db.setUserName("urcwxsqgdun2tukm");
    db.setPassword("8QDCaE22vYVXmlNxIjNn");
    db.setDatabaseName("bd5s63srxd7fvmbw3cai");
    ui->paciente->setReadOnly(true);
    ui->servicio->setReadOnly(true);
    currentIndex = 0;
}

update::~update()
{
    delete ui;
}

void update::on_actualizar_clicked()
{
    QString date = ui->date->date().toString(Qt::DateFormat::ISODate);
    QString time = ui->time->time().toString();
    QString id = ui->id->text();
    QString realizada = QString::number(0);
    if(ui->realizada->checkState() == Qt::Checked) {
        realizada = QString::number(1);
    }

    QSqlQuery query;
    qDebug() << "UPDATE citas SET cit_fecha = '" + date + "' ,cit_hora = '" + time +"', cit_realizada = " + realizada + " WHERE cit_id = " + id;
    if(query.exec("UPDATE citas SET cit_fecha = '" + date + "' ,cit_hora = '" + time +"', cit_realizada = " + realizada + " WHERE cit_id = " + id)) {
        QMessageBox::information(this, "Actualizacion", "Cita actualizada", QMessageBox::StandardButton::Ok);
        this->close();
    }
    else {
    qDebug() << query.lastError().text();
    }
}

void update::on_buscar_clicked()
{
        qDebug() << ui->id->text();
            QSqlQuery query;
            if(query.exec("SELECT usuarios.usu_nombre, cit_fecha, cit_hora, cit_realizada, cit_servicio FROM citas JOIN usuarios ON cit_id_usu = usu_id WHERE cit_id = " +ui->id->text())) {
                if(query.size() == 0)
                    QMessageBox::information(this, "Actualizar", "ID no encontrado, refierace a la tabla de citas actualizada", QMessageBox::StandardButton::Ok);
                while (query.next()) {
                qDebug() << query.value(0) << query.value(1) << query.value(2);
                ui->paciente->setText(query.value(0).toString());
                ui->date->setDate(query.value(1).toDate());
                ui->time->setTime(query.value(2).toTime());
                ui->servicio->setText(query.value(4).toString());
                if(query.value(3) == 1)
                    ui->realizada->setCheckState(Qt::Checked);
                else
                    ui->realizada->setCheckState(Qt::Unchecked);
                }
            }
            else {
                qDebug() << query.lastError().text();
                }
}
