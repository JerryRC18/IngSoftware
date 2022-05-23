#ifndef CITA_H
#define CITA_H

#include <QMainWindow>
#include <QTableWidgetItem>
#include <QtSql>
#include <QSqlDatabase>
#include <QSqlQuery>
#include <QDebug>

namespace Ui {
class Historial;
}

class Historial : public QMainWindow
{
    Q_OBJECT

public:
    explicit Historial(QWidget *parent = nullptr);
    ~Historial();

private slots:
    void on_accept_clicked();

private:
    Ui::Historial *ui;
    QSqlDatabase db;
};

#endif // CITA_H
